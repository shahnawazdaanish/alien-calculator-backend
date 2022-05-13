<?php

namespace App\Classes;

use Illuminate\Support\Facades\Config;

class Utility
{
    final public static function convertCodePointToUtf8(string $string): string
    {
        $codeLength = strlen(substr($string, 2));

        return html_entity_decode(
            preg_replace("/U\+([0-9A-F]{" . $codeLength . "})/", "&#x\\1;", $string),
            ENT_NOQUOTES,
            'UTF-8'
        );
    }

    final public static function getStoredAliases(): array
    {
        return array_column(self::getStoredOperations(), 'alias');
    }

    final public static function getStoredOperations(): array
    {
        return Config::get("operations");
    }

    final public static function getInputSizeOfOperation(string $alias): int
    {
        $operation = self::getOperationByAlias($alias);
        if ($operation) {
            return $operation['inputs'];
        }
        return 0;
    }

    final public static function getOperationByAlias(string $alias): array
    {
        $operations = self::getStoredOperations();
        foreach ($operations as $index => $operation) {
            if ($operation['alias'] === $alias) {
                $operation['operation'] = $index;
                return $operation;
            }
        }
        return [];
    }
}
