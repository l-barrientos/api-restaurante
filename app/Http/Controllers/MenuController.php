<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller {
    public function getAll() {
        return Menu::all();
    }

    public function getById($id) {
        return Menu::find($id);
    }

    public function store(Request $request) {
        $newMenu = new Menu;
        $newMenu->name = $request->name;
        $newMenu->category = $request->category;
        $newMenu->price = $request->price;
        $newMenu->save();

        return [
            'Status' => 'OK',
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price
        ];
    }

    public function update(Request $request, $id) {
        $menu = Menu::find($id);
        if (isset($request->name)) {
            $menu->name = $request->name;
        }
        if (isset($request->category)) {
            $menu->category = $request->category;
        }
        if (isset($request->price)) {
            $menu->price = $request->price;
        }
        $menu->save();

        return [
            'Status' => 'OK',
            'name' => $menu->name,
            'category' => $menu->category,
            'price' => $menu->price
        ];
    }

    public function destroy($id) {
        $menu = Menu::find($id);
        $menu->delete();
        return [
            'Status' => 'OK',
        ];
    }
}
