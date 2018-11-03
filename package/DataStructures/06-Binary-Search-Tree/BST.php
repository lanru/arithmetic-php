<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/1
 * Time: 10:28 PM
 */

require_once __DIR__ . "/BSTNode.php";
require_once __DIR__ . "/../03-Stacks-and-Queues/Stack/ArrayStack.php";
require_once __DIR__ . "/../04-Linked-List/LinkedList.php";

class BST
{
    private $root;
    private $size;

    public function __construct()
    {
        $this->root = null;
        $this->size = 0;
    }

    public function size()
    {
        return $this->size;
    }

    public function isEmpty()
    {
        return $this->size == 0;
    }

    public function add(int $e)
    {
        $this->root = $this->add1($this->root, $e);
    }

    private function add1(?BSTNode $node, int $e)
    {
        if ($node == null) {
            $this->size++;
            return new BSTNode($e);
        }
        if ($e < $node->e) {
            $node->left = $this->add1($node->left, $e);
        } elseif ($e > $node->e) {
            $node->right = $this->add1($node->right, $e);
        }
        return $node;
    }

    public function contains($e)
    {
        return $this->contains1($this->root, $e);
    }

    private function contains1(?BSTNode $node, $e)
    {
        if ($node == null) {
            return false;
        }
        if ($e == $node->e) {
            return true;
        } elseif ($e < $node->e) {
            return $this->contains1($node->left, $e);
        } else {
            return $this->contains1($node->right, $e);
        }
    }

    // 二分搜索树的前序遍历
    public function preOrder()
    {
        $this->preOrder1($this->root);
    }

    public function preOrderNR()
    {
        $stack = new ArrayStack();
        $stack->push($this->root);
        while (!$stack->isEmpty()) {
            $cur = $stack->pop();
            echo $cur->e . "\n";
            if ($cur->right != null) {
                $stack->push($cur->right);
            }
            if ($cur->left != null) {
                $stack->push($cur->left);
            }
        }
    }

    public function postOrder()
    {
        $this->postOrder1($this->root);
    }

    private function postOrder1(?BSTNode $node)
    {
        if ($node == null)
            return;
        $this->postOrder1($node->left);
        $this->postOrder1($node->right);
        echo $node->e . "\n";
    }

    public function levelOrder()
    {
        $q = new LinkedList();
        $q->addFirst($this->root);
        while (!$q->isEmpty()) {
            $cur = $q->remove(0);
            echo $cur . "\n";
            if ($cur->left != null) {
                $q->addLast($cur->left);
            }
            if ($cur->right != null) {
                $q->addLast($cur->right);
            }
        }
    }

    public function inOrder()
    {
        $this->inOrder1($this->root);
    }

    private function inOrder1(?BSTNode $node)
    {
        if ($node == null) {
            return;
        }
        $this->inOrder1($node->left);
        echo $node->e . "\n";
        $this->inOrder1($node->right);
    }

    //前序遍历以node为根的二分搜索树，递归算法
    private function preOrder1(?BSTNode $node)
    {
        if ($node == null) {
            return;
        }
        echo $node->e . "\n";
        $this->preOrder1($node->left);
        $this->preOrder1($node->right);
    }

    public function __toString()
    {
        $res = "";
        $this->generateBSTString($this->root, 0, $res);
        return $res;
    }


    private function generateBSTString(?BSTNode $node, ?int $depth, ?string &$res)
    {
        if ($node == null) {
            $res .= $this->generateDepthString($depth) . "null \n";
            return;
        }
        $res .= $this->generateDepthString($depth) . $node->e . "\n";
        $this->generateBSTString($node->left, $depth + 1, $res);
        $this->generateBSTString($node->right, $depth + 1, $res);
    }

    private function generateDepthString(?int $depth)
    {
        $res = "";
        for ($i = 0; $i < $depth; $i++) {
            $res .= "--";
        }
        return $res;
    }

    public function minimum()
    {
        if ($this->size == 0) {
            throw  new Exception("BST is empty");
        }
        return $this->minimum1($this->root);
    }

    private function minimum1(?BSTNode $node):?BSTNode
    {
        if ($node->left == null) {
            return $node;
        }
        return $this->minimum1($node->left);
    }

    public function maxmum()
    {
        if ($this->size == 0) {
            throw  new Exception("BST is empty");
        }
        return $this->maxmum1($this->root)->e;
    }

    private function maxmum1(?BSTNode $node):?BSTNode
    {
        if ($node->right == null) {
            return $node;
        }
        return $this->maxmum1($node->right);
    }

    public function removeMin()
    {
        $ret = $this->minimum();
        $this->root = $this->removeMin1($this->root);
        return $ret;
    }

    private function removeMin1(?BSTNode $node)
    {
        if ($node->left == null) {
            $rightNode = $node->right;
            $node->right = null;
            $this->size--;
            return $rightNode;
        }
        $node->left = $this->removeMin1($node->left);
        return $node;
    }

    public function removeMax()
    {
        $ret = $this->maxmum();
        $this->root = $this->removeMax1($this->root);
        return $ret;
    }

    private function removeMax1(?BSTNode $node)
    {
        if ($node->right == null) {
            $leftNode = $node->left;
            $node->left = null;
            $this->size--;
            return $leftNode;
        }
        $node->right = $this->removeMax1($node->right);
        return $node;
    }

    public function remove($e)
    {
        $this->root = $this->remove1($this->root, $e);
    }

    private function remove1(?BSTNode &$node, $e)
    {
        if ($node == null) {
            return null;
        }
        if ($e < $node->e) {
            $node->left = $this->remove1($node->left, $e);
            return $node;
        } elseif ($e > $node->e) {
            $node->right = $this->remove1($node->right, $e);
            return $node;
        } else {
            // 待删除节点的左子树为空的情况
            if ($node->left == null) {
                $rightNode = $node->right;
                $node->right = null;
                $this->size--;
                return $rightNode;
                // 待删除节点的右子树为空的情况
            } elseif ($node->right == null) {
                $leftNode = $node->left;
                $node->left = null;
                $this->size--;
                return $leftNode;
            } else // $e ==$node->e
            {
                // 待删除节点左右子树均不为空的情况
                // 找到比待删除节点大的最小节点，即待删除节点右子树的最小节点
                // 用这个节点替代删除节点的位置
                $successor = $this->minimum($node->right);
                $successor->right = $this->removeMin($node->right);
                $successor->left = $node->left;
                $node->left = $node->right = null;
                $this->size--;
                return $successor;
            }
        }
    }
}