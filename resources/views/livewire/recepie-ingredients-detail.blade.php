<div>
    <div class="mb-4">
        @can('create', App\Models\Ingredient::class)
        <button class="btn btn-primary" wire:click="newIngredient">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Ingredient::class)
        <button
            class="btn btn-danger"
             {{ empty($selected) ? 'disabled' : '' }} 
            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
            wire:click="destroySelected"
        >
            <i class="icon ion-md-trash"></i>
            @lang('crud.common.delete_selected')
        </button>
        @endcan
    </div>

    <x-modal id="recepie-ingredients-modal" wire:model="showingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div>
                    <x-inputs.group class="col-sm-12 col-lg-4">
                        <x-inputs.text
                            name="ingredient.name"
                            label="Name"
                            wire:model="ingredient.name"
                            maxlength="255"
                            placeholder="Name"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12 col-lg-4">
                        <x-inputs.text
                            name="ingredient.unit"
                            label="Unit"
                            wire:model="ingredient.unit"
                            maxlength="255"
                            placeholder="Unit"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12 col-lg-4">
                        <x-inputs.number
                            name="ingredient.quantity"
                            label="Quantity"
                            wire:model="ingredient.quantity"
                            max="255"
                            placeholder="Quantity"
                        ></x-inputs.number>
                    </x-inputs.group>
                </div>
            </div>

            @if($editing) @endif

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light float-left"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="icon ion-md-close"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-primary" wire:click="save">
                    <i class="icon ion-md-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>

    <div class="table-responsive">
        <table class="table table-borderless table-hover">
            <thead>
                <tr>
                    <th>
                        <input
                            type="checkbox"
                            wire:model="allSelected"
                            wire:click="toggleFullSelection"
                            title="{{ trans('crud.common.select_all') }}"
                        />
                    </th>
                    <th class="text-left">
                        @lang('crud.recepie_ingredients.inputs.name')
                    </th>
                    <th class="text-left">
                        @lang('crud.recepie_ingredients.inputs.unit')
                    </th>
                    <th class="text-right">
                        @lang('crud.recepie_ingredients.inputs.quantity')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($ingredients as $ingredient)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $ingredient->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">{{ $ingredient->name ?? '-' }}</td>
                    <td class="text-left">{{ $ingredient->unit ?? '-' }}</td>
                    <td class="text-right">
                        {{ $ingredient->quantity ?? '-' }}
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $ingredient)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editIngredient({{ $ingredient->id }})"
                            >
                                <i class="icon ion-md-create"></i>
                            </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">{{ $ingredients->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
