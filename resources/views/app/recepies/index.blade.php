@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Recepie::class)
                <a
                    href="{{ route('recepies.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.recepies.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.recepies.inputs.picture')
                            </th>
                            <th class="text-left">
                                @lang('crud.recepies.inputs.title')
                            </th>
                            <th class="text-left">
                                @lang('crud.recepies.inputs.description')
                            </th>
                            <th class="text-left">
                                @lang('crud.recepies.inputs.type')
                            </th>
                            <th class="text-right">
                                @lang('crud.recepies.inputs.time')
                            </th>
                            <th class="text-right">
                                @lang('crud.recepies.inputs.serves')
                            </th>
                            <th class="text-left">
                                @lang('crud.recepies.inputs.instructions')
                            </th>
                            <th class="text-right">
                                @lang('crud.recepies.inputs.energie')
                            </th>
                            <th class="text-right">
                                @lang('crud.recepies.inputs.sugar')
                            </th>
                            <th class="text-right">
                                @lang('crud.recepies.inputs.calories')
                            </th>
                            <th class="text-right">
                                @lang('crud.recepies.inputs.fat')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recepies as $recepie)
                        <tr>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $recepie->picture ? \Storage::url($recepie->picture) : '' }}"
                                />
                            </td>
                            <td>{{ $recepie->title ?? '-' }}</td>
                            <td>{{ $recepie->description ?? '-' }}</td>
                            <td>{{ $recepie->type ?? '-' }}</td>
                            <td>{{ $recepie->time ?? '-' }}</td>
                            <td>{{ $recepie->serves ?? '-' }}</td>
                            <td>{{ $recepie->instructions ?? '-' }}</td>
                            <td>{{ $recepie->energie ?? '-' }}</td>
                            <td>{{ $recepie->sugar ?? '-' }}</td>
                            <td>{{ $recepie->calories ?? '-' }}</td>
                            <td>{{ $recepie->fat ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $recepie)
                                    <a
                                        href="{{ route('recepies.edit', $recepie) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $recepie)
                                    <a
                                        href="{{ route('recepies.show', $recepie) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $recepie)
                                    <form
                                        action="{{ route('recepies.destroy', $recepie) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">{!! $recepies->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
