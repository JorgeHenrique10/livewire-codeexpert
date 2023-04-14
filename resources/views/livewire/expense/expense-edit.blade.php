<div class="max-w-7xl mx-auto py-15">

    <x-slot name='header'>
        Editar Registro
    </x-slot>

    <div class=" w-full mx-auto">
        <form method="" wire:submit.prevent='updateExpense' class="space-y-2">
            @include('includes.message')

            <div class="w-full px-3 mb-6 md:mb-0">
                <label for="description" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2  ">
                    Descrição do Produto
                </label>
                <input id="description" type="text" wire:model='description' name="description"
                    class="block appearance-none w-full bg-gray-200 focus:outline-none focus:bg-white border @error('description') border-red-500 @else border-gray-200 @enderror">
                @error('description')
                    <h5 class="text-red-500 text-xs italic"> {{ $message }} </h5>
                @enderror
            </div>

            <div class="w-full px-3 mb-6 md:mb-0">
                <label for="type" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2  ">
                    Tipo do Registro
                </label>
                <select id="type" name="type" wire:model='type'
                    class="block appearance-none w-full bg-gray-200 focus:outline-none focus:bg-white border @error('type') border-red-500 @else border-gray-200 @enderror">
                    <option>Selecione um valor...</option>
                    <option value="1">Entrada</option>
                    <option value="2">Saída</option>
                </select>
                @error('type')
                    <h5 class="text-red-500 text-xs italic"> {{ $message }} </h5>
                @enderror
            </div>

            <div class="w-full px-3 mb-6 md:mb-0">
                <label for="amount" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2  ">
                    Valor do Registro
                </label>
                <input id="amount" type="text" wire:model='amount' name="amount"
                    class="block appearance-none w-full bg-gray-200 focus:outline-none focus:bg-white border @error('amount') border-red-500 @else border-gray-200 @enderror">
                @error('amount')
                    <h5 class="text-red-500 text-xs italic"> {{ $message }} </h5>
                @enderror
            </div>

            <button wire:submit class="bg-black text-white p-2 px-4 rounded-xl hover:bg-gray-700"> Enviar
            </button>

        </form>
    </div>
</div>
