<div>
    {{-- Do your work, then step back. --}}
    <div class="">
        <div class="mb-2 mt-4">
            <div class="p-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="p-1 text-center text-2xl bg-white overflow-hidden shadow-xl sm:rounded-lg border-gray-50-s dark:bg-gray-800 dark:text-white">
                    Listado de estudiantes
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    {{-- <x-jet-welcome /> --}}

                    {{-- begin tabla lista estudiantes  --}}

                    <div>
                        <div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <th class="px-4 py-3">Name</th>
                                            <th class="px-4 py-3">email</th>
                                            <th class="px-4 py-3">lv_id</th>
                                            <th class="px-4 py-3">group</th>
                                            <th class="px-4 py-3">phone_number</th>
                                            <th class="px-4 py-3">geolocation</th>
                                            <th class="px-4 py-3">Status</th>
                                            <th class="px-4 py-3">usertype </th>
                                            <th class="px-2 py-2">cant. courses</th>
                                            <th class="px-4 py-3">edit</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                                        @foreach ($users as $user)
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3">
                                                    <div class="flex items-center text-sm">
                                                        <!-- Avatar with inset shadow -->
                                                        <div>
                                                            <p class="font-semibold">{{ $user->first_name }}</p>
                                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                                {{ $user->last_name }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    {{ $user->email }}
                                                </td>
                                                <td class="px-4 py-3 text-xs">
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                        {{ $user->lv_id }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3 text-sm">

                                                    @switch($user->group)
                                                        @case('A')
                                                            <span
                                                                class="px-2 py-1 font-semibold leading-tight text-sky-700 bg-sky-300 rounded-full dark:bg-sky-700 dark:text-sky-100">
                                                                A
                                                            </span>
                                                        @break

                                                        @case('B')
                                                            <span
                                                                class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                                B
                                                            </span>
                                                        @break

                                                        @case('C')
                                                            <span
                                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                                                C
                                                            </span>
                                                        @break

                                                        @case('D')
                                                            <span
                                                                class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                                                                D
                                                            </span>
                                                        @break

                                                        @case('E')
                                                            <span
                                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                                E
                                                            </span>
                                                        @break
                                                    @endswitch

                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    {{ $user->phone_number }}
                                                </td>
                                                <td class="px-4 py-3 text-xs">
                                                    {{ $user->geolocation }}
                                                </td>
                                                <td class="px-4 py-3 text-sm">

                                                    @if ($user->status == 1)
                                                        <span
                                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                            Active
                                                        </span>
                                                    @else
                                                        <span
                                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                                            Inactive
                                                        </span>
                                                    @endif

                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    {{ $user->description_usertype }}
                                                </td>
                                                <td class="px-4 py-3 text-xs">
                                                    <button onclick="viewCourses({{ $user->id }})"
                                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                                        @php
                                                            $prueba = 0;
                                                        @endphp
                                                        @foreach ($coursesDissigned as $coursDissigned)
                                                            @if ($coursDissigned->user_id == $user->id)
                                                                @php
                                                                    $prueba = $prueba + 1;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        @php
                                                            echo $prueba;
                                                        @endphp

                                                    </button>
                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    <button onclick="edit({{ $user }})"
                                                        class="px-2 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                                        edit student
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="px-6 py-3">
                                {{$users->links()}}
                            </div>
                        </div>

                    </div>

                </div>
                {{-- fin tabla lista estudiantes --}}

                {{-- modal listar cursos asignados --}}

                <div x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" id="modalcourses"
                    class="hidden fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
                    wire:ignore.self>
                    <!-- Modal -->
                    <div x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 transform translate-y-1/2"
                        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0  transform translate-y-1/2"
                        class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                        role="dialog" id="modal">
                        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                        <header class="flex justify-end">
                            <button
                                class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                                aria-label="close" onclick="closeModalCourses()">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img"
                                    aria-hidden="true">
                                    <path
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </button>
                        </header>
                        <!-- Modal body -->
                        <div class="mt-4 mb-6">
                            <!-- Modal title -->

                            @if ($assignedcourses != null || $assignedcourses != 0)

                                <h1
                                    class="p-1 text-center text-2xl bg-white overflow-hidden shadow-xl sm:rounded-lg border-gray-50-s dark:bg-gray-800 dark:text-white">
                                    Selecciona los cursos que quieres desasignar de este estudiante</h1>

                                @foreach ($assignedcourses as $assignedcourse)
                                    <div class="flex space-x-4 m-1">

                                        <div class="m-1 form-check">
                                            <input wire:model.defer="courseDeallocate"
                                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="checkbox"
                                                value="@if (is_array($assignedcourse)) {{ $assignedcourse['id'] }}@else{{ $assignedcourse->id }} @endif"
                                                id="flexCheckDefault2">
                                            <label class="text-gray-700 dark:text-gray-400" for="flexCheckDefault2">

                                                @if (is_array($assignedcourse))
                                                    {{ $assignedcourse['name'] }}
                                                @else
                                                    {{ $assignedcourse->name }}
                                                @endif

                                            </label>
                                        </div>
                                    </div>
                                @endforeach

                                <footer
                                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                                    <button wire:click="deallocating" onclick="closeModalCourses()"
                                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Desasignar
                                    </button>
                                </footer>

                            @endif

                            <h1
                                class="p-1 text-center text-2xl bg-white overflow-hidden shadow-xl sm:rounded-lg border-gray-50-s dark:bg-gray-800 dark:text-white">
                                Selecciona los cursos que quieres asignar al estudiante</h1>

                            <div class="flex space-x-4">

                                <div class="grid grid-rows-4 grid-flow-col gap-4">

                                    @if ($courses != null)

                                        @foreach ($courses as $course)
                                            <div class="m-1 form-check">
                                                <input wire:model.defer="courseAssigned"
                                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                    type="checkbox"
                                                    value="
                                                    @if (is_array($course)) {{ $course['id'] }} 
                                                 @else
                                                    {{ $course->id }} @endif
                                                    
                                                    "
                                                    id="flexCheckDefault">
                                                <label class="text-gray-700 dark:text-gray-400"
                                                    for="flexCheckDefault">

                                                    @if (is_array($course))
                                                        {{ $course['name'] }}
                                                    @else
                                                        {{ $course->name }}
                                                    @endif

                                                </label>
                                            </div>
                                        @endforeach

                                    @endif

                                </div>

                            </div>

                        </div>
                        <footer
                            class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                            <button onclick="closeModalCourses()"
                                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                Cancel
                            </button>
                            <button wire:click="assignedCourse" onclick="closeModalCourses()"
                                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Asignar
                            </button>
                        </footer>
                    </div>
                </div>

                {{-- fin modal listar cursos asignados --}}

                {{-- modal editar --}}

                <div x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" id="modaledit"
                    wire:ignore.self
                    class="hidden fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">

                    <!-- Modal -->
                    <div x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 transform translate-y-1/2"
                        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0  transform translate-y-1/2"
                        class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                        role="dialog" id="modal">
                        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                        <header class="flex justify-center border-b-fuchsia-800 border-b">
                            <!-- Modal title -->
                            <p class="justify-start mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                            <h1 class="text-black dark:text-white text-4xl1">Editing the information of the student

                                @if ($editStudent != null)
                                    {{ $editStudent->first_name }} {{ $editStudent->last_name }}
                                @endif
                                <span class="typed2"></span>
                            </h1>
                            </p>
                            <button onclick="closeModalEdit()"
                                class="ml-auto px-5-1 py-3-1 text-sm  rounded-lg  bg-red-600 active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple text-white"
                                aria-label="close">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img"
                                    aria-hidden="true">
                                    <path
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </button>
                        </header>
                        <!-- Modal body -->
                        <div class="mt-4 mb-6">
                            <!-- Modal description -->


                            <form action="" id="formulario">
                                <div class="flex space-x-4 ">

                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            first_name
                                        </span>
                                        <input type="text" wire:model="editStudent.first_name" name="first_name" id="first_name"
                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                                        <span class="text-xs text-gray-600 dark:text-gray-400">
                                            Your password must be at least 6 characters long.
                                        </span>
                                    </label>

                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            last_name
                                        </span>
                                        <input type="text" wire:model="editStudent.last_name" name="last_name" id="last_name"
                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                            placeholder="Jane Doe" />
                                        <span class="text-xs text-gray-600 dark:text-gray-400">
                                            Your password must be at least 6 characters long.
                                        </span>
                                    </label>

                                </div>

                                <div class="flex space-x-4 ">

                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            email
                                        </span>
                                        <input type="email" wire:model="editStudent.email" name="email" id="email"
                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                            placeholder="Jane Doe" />
                                        <span class="text-xs text-gray-600 dark:text-gray-400">
                                            Your password must be at least 6 characters long.
                                        </span>
                                    </label>

                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            geolocation
                                        </span>
                                        <input type="text" wire:model="editStudent.geolocation" name="geolocation" id="geolocation"
                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                            placeholder="Jane Doe" />
                                        <span class="text-xs text-gray-600 dark:text-gray-400">
                                            Your password must be at least 6 characters long.
                                        </span>
                                    </label>

                                </div>

                                <div class="flex space-x-4 ">

                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            phone_number
                                        </span>
                                        <input type="text" wire:model="editStudent.phone_number"
                                            name="phone_number" id="phone_number"
                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                            placeholder="Jane Doe" />
                                        <span class="text-xs text-gray-600 dark:text-gray-400">
                                            Your password must be at least 6 characters long.
                                        </span>
                                    </label>

                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            status
                                        </span>
                                        <select wire:model="editStudent.status" id="" name=""
                                            class="block w-full py-2 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                        <span class="text-xs text-gray-600 dark:text-gray-400">
                                            Your password must be at least 6 characters long.
                                        </span>
                                    </label>

                                </div>

                                <div class="flex space-x-4 ">

                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            group
                                        </span>
                                        <select wire:model="editStudent.group" id="" name=""
                                            class="block w-full py-2 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                        </select>
                                        <span class="text-xs text-gray-600 dark:text-gray-400">
                                            Your password must be at least 6 characters long.
                                        </span>
                                    </label>

                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            lv_id
                                        </span>
                                        <select wire:model="editStudent.lv_id" id="" name=""
                                            class="block w-full py-2 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <span class="text-xs text-gray-600 dark:text-gray-400">
                                            Your password must be at least 6 characters long.
                                        </span>
                                    </label>

                                </div>
                            </form>

                        </div>
                        <footer
                            class="flex flex-col items-center justify-end px-6 py-3-1 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800 border-t-fuchsia-800">
                            <button onclick="closeModalEdit()"
                                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                Cancel
                            </button>
                            <button wire:click="update" onclick="closeModalEdit()"
                                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Accept
                            </button>
                        </footer>
                    </div>
                </div>

                {{-- fin modal editar --}}

            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        function closeModalCourses() {
            scroll.scrollTop = 0;
            document.getElementById('modalcourses').classList.add('hidden');
        }

        Livewire.on('openModalCourses', () => {
            viewhide('modalcourses', 'block', 'hidden');
        })

        function viewCourses(id) {
            Livewire.emit('listCourses', [id]);
        }

        Livewire.on('message', (output) => {
            output = output.output;

            if (output == 'a') {

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Se ha sasignado uno o mas cursos a este estudiante',
                    showConfirmButton: false,
                    timer: 1500
                })

            } else if (output == 'd') {

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Se ha desasignado uno o mas cursos a este estudiante',
                    showConfirmButton: false,
                    timer: 1500
                })

            } else if (output == 'u') {

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Se ha actualizado de la información del estudiante',
                    showConfirmButton: false,
                    timer: 1500
                })

            }


        })

        function closeModalEdit() {
            scroll.scrollTop = 0;
            document.getElementById('modaledit').classList.add('hidden');
        }

        Livewire.on('openModalEdit', () => {
            viewhide('modaledit', 'block', 'hidden');
        })

        function edit($user) {
            Livewire.emit('editing', [$user]);
        }

        function viewhide(id, adhere, stirring) {

            document.getElementById(id).classList.remove(stirring);
            document.getElementById(id).classList.add(adhere);
        }

        inputs.forEach(input => {
            input.addEventListener('keyup', validarFormulario);
            input.addEventListener('blur', validarFormulario);
        });
    </script>
@endsection
''