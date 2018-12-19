<?php
/**
 * Created by PhpStorm.
 * User: krulvis
 * Date: 12/16/18
 * Time: 1:44 PM
 */

namespace App\Formatters;


class ItemParseFormatter {

    protected $data;

    /**
     * ItemParseFormatter constructor.
     * @param $data
     */
    public function __construct(array $data) {
        $this->data = $data;
    }

    public function format(): array {
        return $this->toArray((object)$this->data);
    }

    protected function toArray(\stdClass $item): array {
        unset($item->type);

        $data = [
            "name" => $item->name ?? "unknown",
            "source" => $item->source ?? "unknown",
            "price" => $item->price ?? "0 gp",
            "weight" => $this->handleWeight($item),
            "description" => $item->section->body ?? "",
            "categories" => isset($item->misc) ? array_keys($item->misc) : [],
        ];
        if (isset($item->misc)) {
            foreach ($item->misc as $category) {
                $data = array_merge($data, $category);
            }
        }
        return $data;
    }

    private function handleWeight(\stdClass $item) {
        $weight = $item->weight ?? "0 lb.";
        return str_contains($weight, "&mdash") ? "0 lb." : $weight;
    }

}