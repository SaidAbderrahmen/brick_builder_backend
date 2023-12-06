@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('recepies.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.recepies.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.recepies.inputs.picture')</h5>
                    <x-partials.thumbnail
                        src="{{ $recepie->picture ? \Storage::url($recepie->picture) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recepies.inputs.title')</h5>
                    <span>{{ $recepie->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recepies.inputs.description')</h5>
                    <span>{{ $recepie->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recepies.inputs.type')</h5>
                    <span>{{ $recepie->type ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recepies.inputs.time')</h5>
                    <span>{{ $recepie->time ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recepies.inputs.serves')</h5>
                    <span>{{ $recepie->serves ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recepies.inputs.instructions')</h5>
                    <span>{{ $recepie->instructions ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recepies.inputs.energie')</h5>
                    <span>{{ $recepie->energie ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recepies.inputs.sugar')</h5>
                    <span>{{ $recepie->sugar ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recepies.inputs.calories')</h5>
                    <span>{{ $recepie->calories ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recepies.inputs.fat')</h5>
                    <span>{{ $recepie->fat ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('recepies.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Recepie::class)
                <a href="{{ route('recepies.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    @can('view-any', App\Models\Ingredient::class)
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title w-100 mb-2">Ingredients</h4>

            <livewire:recepie-ingredients-detail :recepie="$recepie" />
        </div>
    </div>
    @endcan
</div>
@endsection
