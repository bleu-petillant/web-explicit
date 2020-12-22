<div>
    <input @click.away="{ open = false; @this.resetIndex(); }" @click="{ open = true }" type="text"
        class=" input focus:outline-none placeholder-cool-gray-500 " placeholder="Recherche" wire:model="query"
        wire:keydown.arrow-down.prevent="incrementIndex" wire:keydown.arrow-up.prevent="decrementIndex"
    />

    <select name="category_id" id="category_id" wire:model="category_id" @click="{ open = true }" >
     <option value="" selected>Toutes les catégories</option>
        @foreach ($category as $cat)
        <option value="{{$cat->id}}" >{{$cat->name}} </option > 
        @endforeach
    </select>
</div>
