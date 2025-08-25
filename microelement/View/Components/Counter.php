<?php
namespace MicroElement\View\Components;
use MicroElement\View\Component;
class Counter extends Component {
    public int $count = 0;
    public function increment() { $this->count++; }
    public function render() { return \$this->view('components.counter', ['count' => \$this->count]); }
}
