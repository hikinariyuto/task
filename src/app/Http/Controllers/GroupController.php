<?php

namespace App\Http\Controllers;
use App\Models\Group;
use App\Http\Requests\GroupRequest;


use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function devide()
    {
        $groups = Group::all();
        return view('group', compact('groups'));
    }

    public function store(GroupRequest $request)
    {
        $group = $request->only(['group_name']);
        Group::create($group);
        return redirect('/groups')->with('message', 'グループ作成完了');
    }

    public function update(GroupRequest $request)
    {
        $group = $request->only(['group_name']);
        Group::find($request->id)->update($group);
        return redirect('/groups')->with('message', 'グループ更新完了');
    }

    public function destroy(Request $request)
    {
        group::find($request->id)->delete();
        return redirect('/groups')->with('message', 'カテゴリ削除完了');
}
}
