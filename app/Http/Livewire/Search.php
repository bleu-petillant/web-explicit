<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;


class Search extends Component
{
    public string $query = '';
    public $courses = [];
    public Int $selectedIndex = 0;

    public function incrementIndex()
    {
        if($this->selectedIndex === count($this->courses) -1){
            $this->selectedIndex = 0;
            return;
        }
        $this->selectedIndex ++;
    }

    public function decrementIndex()
    {
        if($this->selectedIndex === 0){
            $this->selectedIndex = (count($this->courses) -1);
            return;
        }

        $this->selectedIndex --;
    }

    public function updatedQuery()
    {
        $search = '%'. $this->query .'%';
        if(strlen($this->query) > 2 ){
            $this->courses = Course::where('slug','like',$search)
            ->orWhere('title','like',$search)
            ->orWhere('desc','like',$search)
            ->get();
        }

    }
    public function showCourse()
    {
        
    }

    public function resetIndex()
    {
        $this->reset('selectedIndex');
    }
    public function render()
    {

        return view('livewire.search');
    }
}
