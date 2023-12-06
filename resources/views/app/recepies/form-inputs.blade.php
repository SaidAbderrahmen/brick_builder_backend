@php $editing = isset($recepie) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $recepie->picture ? \Storage::url($recepie->picture) : '' }}')"
        >
            <x-inputs.partials.label
                name="picture"
                label="Picture"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="picture"
                    id="picture"
                    @change="fileChosen"
                />
            </div>

            @error('picture') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="title"
            label="Title"
            :value="old('title', ($editing ? $recepie->title : ''))"
            maxlength="255"
            placeholder="Title"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $recepie->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="type" label="Type">
            @php $selected = old('type', ($editing ? $recepie->type : '')) @endphp
            <option value="breakfast" {{ $selected == 'breakfast' ? 'selected' : '' }} >Breakfast</option>
            <option value="lunch" {{ $selected == 'lunch' ? 'selected' : '' }} >Lunch</option>
            <option value="dinner" {{ $selected == 'dinner' ? 'selected' : '' }} >Dinner</option>
            <option value="desert" {{ $selected == 'desert' ? 'selected' : '' }} >Desert</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="time"
            label="Time"
            :value="old('time', ($editing ? $recepie->time : ''))"
            max="255"
            placeholder="Time"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-6">
        <x-inputs.number
            name="serves"
            label="Serves"
            :value="old('serves', ($editing ? $recepie->serves : ''))"
            max="255"
            placeholder="Serves"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="instructions"
            label="Instructions"
            maxlength="255"
            required
            >{{ old('instructions', ($editing ? $recepie->instructions : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-3">
        <x-inputs.number
            name="energie"
            label="Energie"
            :value="old('energie', ($editing ? $recepie->energie : ''))"
            max="255"
            step="0.01"
            placeholder="Energie"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-3">
        <x-inputs.number
            name="sugar"
            label="Sugar"
            :value="old('sugar', ($editing ? $recepie->sugar : ''))"
            max="255"
            step="0.01"
            placeholder="Sugar"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-3">
        <x-inputs.number
            name="calories"
            label="Calories"
            :value="old('calories', ($editing ? $recepie->calories : ''))"
            max="255"
            step="0.01"
            placeholder="Calories"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12 col-lg-3">
        <x-inputs.number
            name="fat"
            label="Fat"
            :value="old('fat', ($editing ? $recepie->fat : ''))"
            max="255"
            step="0.01"
            placeholder="Fat"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
