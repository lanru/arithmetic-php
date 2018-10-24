<?php

/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/22
 * Time: 11:00 PM
 */
class TestArray
{
    protected $data;
    protected $size;//最后一个有内容的位置

    // 构造函数，传入数组的容量capacity构造Array
    function __construct($capacity)
    {
        $this->data = array_fill(0, $capacity, null);
        $this->size = 0;
    }

    // 获取数组的容量
    public function getCapacity()
    {
        return count($this->data);
    }

    // 获取数组中的元素个数
    public function getSize()
    {
        return $this->size;
    }

    // 返回数组是否为空
    public function isEmpty()
    {
        return $this->size == 0;
    }

    public function addLast($e)
    {
//        if ($this->size == count($this->data)) {
//            throw  new Exception("illiegal");
//        }
//        $this->data[$this->size] = $e;
//        $this->size++;
        $this->add($this->size, $e);
    }

    public function addFirst($e)
    {
        $this->add(0, $e);
    }

    protected function resize($newCapacity)
    {
        $newData = array_fill(0, $newCapacity, null);
        for ($i = 0; $i < $this->size; $i++) {
            $newData[$i] = $this->data[$i];
        }
        $this->data = $newData;
        $newData = null;
    }

    public function add($index, $e)
    {
        if ($index < 0 || $index > $this->size) {
            throw  new Exception("invalid parameter");
        }
        if ($this->size == count($this->data))
            $this->resize(2 * count($this->data));

        for ($i = $this->size - 1; $i >= $index; $i--) {
            $this->data[$i + 1] = $this->data[$i];
        }
        $this->data[$index] = $e;
        $this->size++;
    }

    public function toString()
    {
        $capacity = $this->getCapacity();
        $result = "Array:size={$this->size},capacity={$capacity}\n";
        $result .= "[";
        for ($i = 0; $i < $this->size; $i++) {

            $result .= $this->data[$i];

            if ($i != $this->size - 1) {
                $result .= ",";
            }
        }
        $result .= "]";
        return $result;
    }

    public function get($index)
    {
        if ($index < 0 || $index >= $this->size) {
            throw  new Exception("illegal");
        }
        return $this->data[$index];
    }

    public function set($index, $e)
    {
        if ($index < 0 || $index >= $this->size) {
            throw  new Exception("illegal");
        }
        $this->data[$index] = $e;
    }

    public function getLast()
    {
        return $this->get($this->size - 1);
    }

    public function getFirst()
    {
        return $this->get(0);
    }

    public function contains($e)
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->data[$i] == $e)
                return true;
        }
        return false;
    }

    public function find($e)
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->data[$i] == $e)
                return $i;
        }
        return -1;
    }

    public function remove($index)
    {
        if ($index < 0 || $index >= $this->size) {
            throw  new Exception("illegal");
        }
        $ret = $this->data[$index];
        for ($i = $index + 1; $i < $this->size; $i++) {
            $this->data[$i - 1] = $this->data[$i];
        }
        $this->size--;
        $this->data[$this->size] = null;
        if ($this->size == count($this->data) / 4) {
            $this->resize(count($this->data) / 2);
        }
        return $ret;
    }

    public function removeFirst()
    {
        return $this->remove(0);
    }

    public function removeLast()
    {
        return $this->remove($this->size - 1);
    }
}

class  Student
{
    protected $name;
    protected $score;

    function __construct($stu_name, $stu_score)
    {
        $this->name = $stu_name;
        $this->score = $stu_score;
    }

    public function toString()
    {
        return "Studeng name:{$this->name},score:{$this->score}";
    }
}

//$array = new TestArray(20);
//for ($i = 0; $i < 10; $i++) {
//    $array->addLast($i);
//}
//$count = $array->getCapacity();
//$array->addLast(100);
//$array->addFirst(1);
//$var = $array->toString();
//echo $var;

//$arr = new TestArray(10);
//$stu1 = new Student("Alice", 100);
//$stu2 = new Student("Bob", 80);
//$stu3 = new Student("Charlie", 70);
//$stu4 = new Student("Jelly", 70);
//$arr->addLast($stu1);
//$arr->addLast($stu2);
//$arr->addLast($stu3);
//$arr->addLast($stu4);
//$arr->remove(2);
//echo $arr;