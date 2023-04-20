<div class="max-w-7xl py-15 m-auto">
    <x-slot name='header'>Planos</x-slot>
    <div class="w-full m-auto">

        @include('includes.message')

        <div class=" w-full flex justify-end mb-4">
            <a href="{{ route('plan.create') }}"
                class="px-4 py-2 bg-gray-700 hover:bg-gray-500 text-white rounded-xl">Novo Plano</a>
        </div>

        <table class=" table-auto w-full mx-auto">
            <thead>
                <tr class="text-left font-bold">
                    <td class="px-4 py-2 uppercase">#</td>
                    <td class="px-4 py-2 uppercase">Plano</td>
                    <td class="px-4 py-2 uppercase">Valor</td>
                    <td class="px-4 py-2 uppercase">Criado em </td>
                    <td class="px-4 py-2 uppercase">Ações</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($plans as $plan)
                    <tr>
                        <td class="px-4 py-2 border">{{ $plan->id }}</td>
                        <td class="px-4 py-2 border">{{ $plan->description }}</td>
                        <td class="px-4 py-2 border">
                            <span class="text-black'">
                                R$ {{ number_format($plan->price, 2, ',', '.') }}
                            </span>
                        </td>
                        <td class="px-4 py-2 border">
                            {{ $plan->plan_date ? $plan->plan_date->format('d/m/Y H:i:s') : $plan->created_at->format('d/m/Y H:i:s') }}
                        </td>
                        <td class="px-4 py-2 border">
                            {{-- <a class="px-4 py-2 rounded bg-blue-500 hover:bg-blue-300 text-white"
                                href="{{ route('plans.edit', $plan->id) }}">Editar</a>
                            <a class="px-4 py-2 rounded bg-red-500 hover:bg-red-300 text-white" href="#"
                                wire:click.prevent="remove({{ $plan->id }})">Remover</a> --}}
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="w-full mx-auto mt-10">
            {{ $plans->links() }}
        </div>

    </div>
</div>
