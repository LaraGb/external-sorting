<?php
class MinHeapNode
{
    public $element;
    public $i;

    public function __construct($element, $i)
    {
        $this->element = $element;
        $this->i = $i;
    }
}

class MinHeap
{
    private $heap;
    private $order;

    public function __construct($order = 'asc')
    {
        $this->heap = [];
        $this->order = $order;
    }

    public function insert($node)
    {
        $this->heap[] = $node;
        $this->heapifyUp(count($this->heap) - 1);
    }

    public function remove()
    {
        if ($this->isEmpty()) {
            return null;
        }

        $minNode = $this->heap[0];
        $this->heap[0] = $this->heap[count($this->heap) - 1];
        array_pop($this->heap);
        $this->heapifyDown(0);

        return $minNode;
    }

    public function isEmpty()
    {
        return count($this->heap) === 0;
    }

    private function heapifyUp($i)
    {
        while ($i > 0 && $this->compare($this->heap[$i]->element['price'], $this->heap[$this->parent($i)]->element['price'])) {
            $this->swap($i, $this->parent($i));
            $i = $this->parent($i);
        }
    }

    private function heapifyDown($i)
    {
        $minIndex = $i;
        $left = $this->leftChild($i);
        $right = $this->rightChild($i);

        if ($left < count($this->heap) && $this->compare($this->heap[$left]->element['price'], $this->heap[$minIndex]->element['price'])) {
            $minIndex = $left;
        }

        if ($right < count($this->heap) && $this->compare($this->heap[$right]->element['price'], $this->heap[$minIndex]->element['price'])) {
            $minIndex = $right;
        }

        if ($minIndex !== $i) {
            $this->swap($i, $minIndex);
            $this->heapifyDown($minIndex);
        }
    }

    private function parent($i)
    {
        return floor(($i - 1) / 2);
    }

    private function leftChild($i)
    {
        return 2 * $i + 1;
    }

    private function rightChild($i)
    {
        return 2 * $i + 2;
    }

    private function swap($i, $j)
    {
        $temp = $this->heap[$i];
        $this->heap[$i] = $this->heap[$j];
        $this->heap[$j] = $temp;
    }

    private function compare($a, $b)
    {
        if ($this->order === 'asc') {
            return $a < $b;
        } else {
            return $a > $b;
        }
    }
}

function createInitialRuns($inputFile, $runSize)
{
    $input = file_get_contents($inputFile);
    $jsonArray = json_decode($input, true);
    $runs = [];
    $currentRun = [];

    foreach ($jsonArray as $element) {
        $currentRun[] = $element;
        if (count($currentRun) === $runSize) {
            usort($currentRun, function ($a, $b) {
                return $a['price'] <=> $b['price']; // Ordena pelo preço
            });
            $runs[] = $currentRun;
            $currentRun = [];
        }
    }

    if (count($currentRun) > 0) {
        usort($currentRun, function ($a, $b) {
            return $a['price'] <=> $b['price'];
        });
        $runs[] = $currentRun;
    }

    return $runs;
}


function mergeRuns($runs, $outputFile, $arrayToJson, $order)
{

    $minHeap = new MinHeap($order);
    $runFiles = [];

    foreach ($runs as $i => $run) {
        $runFiles[$i] = $run;
        if (count($run) > 0) {
            $minHeap->insert(new MinHeapNode(array_shift($runFiles[$i]), $i));
        }
    }

    $outputData = [];

    while (!$minHeap->isEmpty()) {
        $root = $minHeap->remove();


        $outputData[] = $root->element;

        if (count($runFiles[$root->i]) > 0) {
            $minHeap->insert(new MinHeapNode(array_shift($runFiles[$root->i]), $root->i));
        }
    }


    $arrayToJson($outputFile, $outputData);
}


function externalSort($inputFile, $outputFile, $runSize, $arrayToJson, $order)
{
    $runs = createInitialRuns($inputFile, $runSize);
    mergeRuns($runs, $outputFile, $arrayToJson, $order);
}
