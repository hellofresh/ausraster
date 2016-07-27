<?php declare(strict_types=1);

namespace HelloFresh\Ausraster\Exception;

class InvalidCellRangeException extends DomainException
{
    protected $message = 'Invalid cell range provided';
}
