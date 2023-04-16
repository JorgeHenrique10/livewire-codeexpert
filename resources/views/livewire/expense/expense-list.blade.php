<div class="max-w-7xl mx-auto py-15 px-4 ">
    <x-slot name="header">
        Meus Registros
    </x-slot>

    @include('includes.message')

    <div class=" w-full flex justify-end">
        <a href="{{ route('expenses.create') }}"
            class="px-4 py-2 bg-gray-700 hover:bg-gray-500 text-white rounded-xl">Novo Registro</a>
    </div>

    <table class=" table-auto w-full mx-auto">
        <thead>
            <tr class="text-left font-bold">
                <td class="px-4 py-2">#</td>
                <td class="px-4 py-2">Descrição</td>
                <td class="px-4 py-2">Valor</td>
                <td class="px-4 py-2">Data Registro</td>
                <td class="px-4 py-2">Ações</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
                <tr>
                    <td class="px-4 py-2 border">{{ $expense->id }}</td>
                    <td class="px-4 py-2 border">{{ $expense->description }}</td>
                    <td class="px-4 py-2 border">
                        <span class="{{ $expense->type == 1 ? 'text-green-700' : 'text-red-700' }}">
                            R$ {{ number_format($expense->amount, 2, ',', '.') }}
                        </span>
                    </td>
                    <td class="px-4 py-2 border">
                        {{ $expense->expense_date ? $expense->expense_date->format('d/m/Y H:i:s') : $expense->created_at->format('d/m/Y H:i:s') }}
                    </td>
                    <td class="px-4 py-2 border">
                        <a class="px-4 py-2 rounded bg-blue-500 hover:bg-blue-300 text-white"
                            href="{{ route('expenses.edit', $expense->id) }}">Editar</a>
                        <a class="px-4 py-2 rounded bg-red-500 hover:bg-red-300 text-white" href="#"
                            wire:click.prevent="remove({{ $expense->id }})">Remover</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-full mx-auto mt-10">
        {{ $expenses->links() }}
    </div>
</div>
