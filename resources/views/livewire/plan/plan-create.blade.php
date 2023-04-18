<div class="max-w-7xl py-15 m-auto">
    <x-slot name='header'>Criar Plano</x-slot>

    <div class="w-full m-auto">

        <form wire:submit.prevent='createPlan' class=" space-y-2">

            @include('includes.message')

            <div class="w-full px-3 mb-6 md:mb-0 space-y-1">

                <label for="name" class="block uppercase text-black font-bold text-xs">Nome Plano</label>
                <input type="text" wire:model='plan.name' id="name"
                    class="block w-full outline-none bg-gray-200 focus:bg-white py-2 px-4 border @error('plan.name')
                         border-red-500 @else border-gray-200
                    @enderror">

                @error('plan.name')
                    <h5 class=" italic text-xs text-red-500"> {{ $message }}</h5>
                @enderror
            </div>

            <div class="w-full px-3 mb-6 md:mb-0 space-y-1">

                <label for="description" class="block uppercase text-black font-bold text-xs">Descrição do Plano</label>
                <input type="text" wire:model='plan.description' id="description"
                    class="block w-full outline-none bg-gray-200 focus:bg-white py-2 px-4 border @error('plan.description')
                         border-red-500 @else border-gray-200
                    @enderror">

                @error('plan.description')
                    <h5 class=" italic text-xs text-red-500"> {{ $message }}</h5>
                @enderror
            </div>

            <div class="w-full px-3 mb-6 md:mb-0 space-y-1">

                <label for="price" class="block uppercase text-black font-bold text-xs">Valor do Plano</label>
                <input type="text" wire:model='plan.price' id="price"
                    class="block w-full outline-none bg-gray-200 focus:bg-white py-2 px-4 border @error('plan.price')
                         border-red-500 @else border-gray-200
                    @enderror">

                @error('plan.price')
                    <h5 class=" italic text-xs text-red-500"> {{ $message }}</h5>
                @enderror
            </div>

            <div class="w-full px-3 mb-6 md:mb-0 space-y-1">

                <label for="slug" class="block uppercase text-black font-bold text-xs">Apelido do Plano</label>
                <input type="text" wire:model='plan.slug' id="slug"
                    class="block w-full outline-none bg-gray-200 focus:bg-white py-2 px-4 border @error('plan.slug')
                         border-red-500 @else border-gray-200
                    @enderror">

                @error('plan.slug')
                    <h5 class=" italic text-xs text-red-500"> {{ $message }}</h5>
                @enderror
            </div>

            <button wire:submit='' class="ml-3 py-2 px-4 bg-teal-400 text-white rounded"> Criar Plano </button>

        </form>

    </div>
</div>
