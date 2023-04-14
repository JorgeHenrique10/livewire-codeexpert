<div class="max-w-7xl m-auto py-15">

    <x-slot name='header'>
        Criar Registro
    </x-slot>

    <div class="w-full m-auto">
        <form method="" wire:submit.prevent='createExpense' class="space-y-2">

            @include('includes.message')

            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2  "
                    for="description">Descrição do
                    Produto</label>
                <input id="description" type="text" wire:model='description' name="description"
                    class="block appearance-none w-full bg-gray-200 focus:outline-none focus:bg-white border @error('description') border-red-500 @else border-gray-200 @enderror">
                @error('description')
                    <h5 class="text-red-500 text-xs italic"> {{ $message }} </h5>
                @enderror
            </div>

            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2  " for="type">Tipo
                    do Registro</label>
                <select id="type" name="type"
                    class="block appearance-none w-full bg-gray-200 focus:outline-none focus:bg-white border @error('type') border-red-500 @else border-gray-200 @enderror"
                    wire:model='type'>
                    <option>Selecione um valor...</option>
                    <option value="1">Entrada</option>
                    <option value="2">Saída</option>
                </select>
                @error('type')
                    <h5 class="text-red-500 text-xs italic"> {{ $message }} </h5>
                @enderror
            </div>

            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="amount">Valor
                    do Registro</label>
                <input id="amount" type="text" wire:model='amount' name="amount"
                    class="block appearance-none w-full bg-gray-200 focus:outline-none focus:bg-white border @error('amount') border-red-500 @else border-gray-200 @enderror">
                @error('amount')
                    <h5 class="text-red-500 text-xs italic"> {{ $message }} </h5>
                @enderror
            </div>

            <button wire:submit class="bg-black text-white p-2 rounded-xl "> Enviar </button>

        </form>
    </div>
</div>
