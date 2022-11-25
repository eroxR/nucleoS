<?php

namespace App\Http\Livewire;

use App\Models\course;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Administrator extends Component
{

    use WithPagination;

    public $assignedcourses = null, $courses = null, $courseAssigned = [], $courseDeallocate = [], $ideUser,
    $editStudent;

    protected $listeners = ['listCourses', 'deallocating','editing'];

    protected $rules = [

        'editStudent.first_name' => 'required',
        'editStudent.email' => 'required',
        'editStudent.last_name' => 'required',
        'editStudent.lv_id' => 'required',
        'editStudent.group' => 'required',
        'editStudent.phone_number' => 'required',
        'editStudent.geolocation' => 'required',
        'editStudent.status' => 'required',
    ];
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $users = User::join('usertype', 'usertype.id', '=', 'users.usertype')
            ->select(
                'users.id',
                'first_name',
                'email',
                'password',
                'last_name',
                'lv_id',
                'group',
                'phone_number',
                'geolocation',
                'status',
                'description_usertype'
            )->where('usertype', '2')
            ->orderBy('users.id', 'asc')->paginate(5);

        $coursesDissigned = DB::table('courses_x_student')->get();
        // $coursesDissigned = $users->get();

        // SELECT *, COUNT(users.id) FROM users INNER JOIN courses_x_student on user_id = users.id GROUP BY users.id ;

        return view('livewire.administrator', compact('users', 'coursesDissigned'));
    }

    public function listCourses($id)
    {

        $this->assignedcourses = DB::table('courses_x_student')
            ->join('courses', 'courses.id', '=', 'courses_x_student.cours_id')
            ->select('courses_x_student.id', 'name')
            ->where('user_id', $id)
            ->get();

        $this->courses = DB::table('courses')->select('name', 'id')
            ->whereNotIn(
                'id',
                DB::table('courses_x_student')
                    ->join('users', 'users.id', '=', 'courses_x_student.user_id')
                    ->select('cours_id')
                    ->where('user_id', $id)
            )
            ->get();

        $this->ideUser = $id[0];

        $this->emit('openModalCourses');
    }

    public function deallocating()
    {
        if ($this->courseDeallocate > null) {
            foreach ($this->courseDeallocate as $courseDeallocates) {

                DB::table('courses_x_student')->where('id', $courseDeallocates)->delete();
            }
        }

        $this->clear();
        $this->emit('message',['output' => 'd']);
    }

    public function assignedCourse()
    {

        foreach ($this->courseAssigned as $courseAssigneds) {

            DB::table('courses_x_student')->insert([
                'user_id' => $this->ideUser,
                'cours_id' => $courseAssigneds
            ]);
        }

        $this->clear();
        $this->emit('message',['output' => 'a']);
    }

    public function editing(user $user){

        $this->editStudent = $user;

        $this->emit('openModalEdit');
    }

    public function update()
    {
        $this->editStudent->save();

        $this->emit('message',['output' => 'u']);
    }

    public function clear()
    {
        $this->reset([
            'ideUser',
        ]);

        $this->courseAssigned = [];
        $this->courseDeallocate = [];
    }
}
