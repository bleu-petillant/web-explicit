<?php

namespace App\Http\Livewire;

use Livewire\Request;
use Livewire\Component;
use App\Models\Category;
use App\Models\Reference;
use Livewire\WithPagination;


class Search extends Component
{
    use WithPagination;
    public $query = '';
    public $category_id = '';
    public  $references = [];
    public $selectedIndex = 0; 

    public function mount(Reference $references)
    {
        $this->references = Reference::with('category')->with('tagged')->where('private',0)->orderBy('created_at','DESC')->get();
    }
    public function incrementIndex()
    {
        if($this->selectedIndex === count($this->references) -1){
            $this->selectedIndex = 0;
            return;
        }
        $this->selectedIndex ++;
    }

    public function decrementIndex()
    {
        if($this->selectedIndex === 0){
            $this->selectedIndex = (count($this->references) -1);
            return;
        }

        $this->selectedIndex --;
    }


    public function updatedQuery()
    {
        $search = '%'.$this->query.'%';
        $category_id =  $this->category_id;
        if(strlen($this->query) > 1 ){
            if(!empty($this->category_id)){
            //    dd($this->query);
                $this->references = Reference::where('private',0)->withAnyTag($search)
                ->orWhere('title','like',$search)
                ->orWhere('desc','like',$search)
                    ->whereHas('category', function ($query) use ($category_id) {
                    $query->where('category_id', $category_id);
                })->get();
            }else
            {
                $this->references = Reference::where('private',0)->withAnyTag($search)->with('category')
                ->orWhere('slug','like',$search)
                ->orWhere('title','like',$search)
                ->orWhere('desc','like',$search)
                ->get();
            }
        }else
        {
            $this->references = Reference::with('category')->with('tagged')->where('private',0)->orderBy('created_at','DESC')->get();
        }

    }


    public function resetIndex()
    {
        $this->reset('selectedIndex');
    }
    public function render()
    {
        $category = Category::all();
        $references = Reference::with('category')->with('tagged')->where('private',0)->orderBy('created_at','DESC')->get();
        return view('livewire.search',compact('category','references'));
    }
}
