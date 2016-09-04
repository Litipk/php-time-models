<?php


namespace Litipk\MacPhply;


final class FunctionSignal extends Signal
{
    /** @var callable */
    private $func;


    /**
     * FunctionSignal constructor.
     * @param callable(int, Context) $func
     */
    public function __construct(callable $func)
    {
        $this->func = $func;
    }

    protected function _at(Context $ctx) : float
    {
        return ($this->func)($ctx->getInstant(), $ctx);
    }
}
