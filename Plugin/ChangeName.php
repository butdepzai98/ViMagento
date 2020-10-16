<?php
namespace ViMagento\HelloWorld\Plugin;

class ChangeName
{
    // function beforeGetName(\ViMagento\HelloWorld\Block\Index $subject, $a, $b)
    // {
    //     $a = "Nguyễn Xuân Vinh";
    //     return [$a, $b];
    // }

    // function afterGetName(\ViMagento\HelloWorld\Block\Index $subject, $result)
    // {
    //     $result[1] = "ham After cua Plugin";
    //     return $result;
    // }

    function aroundGetName(
        \ViMagento\HelloWorld\Block\Index $subject,
        callable $proceed,
        $a, $b
    )
    {
        $a = "before cua Ham arroundGetName";
        $result = $proceed($a, $b);

        $result[1] = "after cua Ham arroundGetName";
        return $result;
    }
}