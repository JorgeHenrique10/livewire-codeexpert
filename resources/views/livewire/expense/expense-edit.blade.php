<div>

    <x-slot name='header'>
        Editar Registro
    </x-slot>

    <div class="flex justify-center mt-5">
        <form method="" wire:submit.prevent='updateExpense' class="space-y-2">
            @if (session()->has('message'))
                <h2>{{ session('message') }}</h5>
            @endif

            <div>
                <label for="description">Descrição do Produto</label>
                <input id="description" type="text" wire:model='description' name="description" class=" shadow border-t">
                @error('description')
                    <h5> {{ $message }} </h5>
                @enderror
            </div>

            <div>
                <label for="type">Tipo do Registro</label>
                <select id="type" name="type" class=" shadow border-t" wire:model='type'>
                    <option>Selecione um valor...</option>
                    <option value="1">Entrada</option>
                    <option value="2">Saída</option>
                </select>
                @error('type')
                    <h5> {{ $message }} </h5>
                @enderror
            </div>

            <div>
                <label for="amount">Valor do Registro</label>
                <input id="amount" type="text" wire:model='amount' name="amount" class=" shadow border-t">
                @error('amount')
                    <h5> {{ $message }} </h5>
                @enderror
            </div>

            <button wire:submit class="bg-black text-white p-2 rounded-xl "> Enviar </button>

        </form>
    </div>
</div>
