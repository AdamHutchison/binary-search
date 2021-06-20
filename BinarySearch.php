<?php

namespace Algorithms;

class BinarySearch
{
    /**
     * @param array[int] $sortedList
     */
    public function __construct(array $sortedList)
    {
        $this->list = $sortedList;
    }

    public function search(int $searchTerm, $lowerBound = null, $upperBound = null): ?int
    {
        // set upp and lower bounds if not recursive call
        $lowerBound ??= 0;
        $upperBound ??= count($this->list) - 1;

        // find mid point
        $mid = $upperBound - floor(($upperBound - $lowerBound) / 2);

        // We've searched all items except the upper and lower bounds
        if ($mid == $upperBound) {
            $this->checkBoundaryKeys($searchTerm, $lowerBound, $upperBound);
        }

        // Check if we've found the search term
        if ($this->list[$mid] == $searchTerm) {
            return $mid;
        }

        // mid is higher than search term so we need to ditch the top half of list
        if ($this->list[$mid] > $searchTerm) {
            return $this->search($searchTerm, $lowerBound, $mid);
        }

        // mid is lower than search term so we need to ditch the top half of list
        if ($this->list[$mid] < $searchTerm) {
            return $this->search($searchTerm, $mid, $upperBound);
        }
    }

    private function checkBoundaryKeys($searchTerm, $upperBound, $lowerBound): ?int
    {
        if ($this->list[$upperBound] == $searchTerm) {
            return $upperBound;
        }

        if ($this->list[$lowerBound] == $searchTerm) {
            return $lowerBound;
        }

        return null;
    }
}
