<x-app-layout>
    <h2 class="intro-y text-lg font-medium mt-10">
        Funcionários
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <form action="{{ route('employees.index') }}" method="GET" class="flex">
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-slate-500">
                        <input type="text" name="query" class="form-control w-56 box pr-10" placeholder="Buscar..."
                            value="{{ $query }}">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary shadow-md ml-2">Buscar</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary shadow-md ml-2">Limpar</a>
            </form>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <x-forms.buttons.create route="employees.create" />
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">NOME</th>
                        <th class="text-center whitespace-nowrap">E-MAIL</th>
                        <th class="text-center whitespace-nowrap">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr class="intro-x">
                            <td>
                                <a href="{{ route('employees.show', $employee->id) }}"
                                    class="font-medium whitespace-nowrap">{{ $employee->name }}</a>
                            </td>
                            <td class="text-center">{{ $employee->email }}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <x-forms.buttons.edit route="employees.edit" :id="$employee->id" />
                                    <x-forms.buttons.destroy route="employees.destroy" :id="$employee->id" />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->

        {{ $employees->links('layouts.paginator') }}

    </div>
</x-app-layout>
