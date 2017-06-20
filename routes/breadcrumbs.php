<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('หน้าแรก', route('home'));
});


/*
 * User and Profile
 * */

// Home > users
Breadcrumbs::register('profile.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('รายชื่อนักวิจัย', route('profile.index'));
});

Breadcrumbs::register('profile.show', function($breadcrumbs, $id) {

    $user = \App\User::find($id);

    $breadcrumbs->parent('profile.index');
    $breadcrumbs->push($user->u_name_th .' ' . $user->u_surname_th, route('profile.show', $user->u_id));
});

Breadcrumbs::register('profile.edit', function($breadcrumbs, $id) {

    $name = "";
    $sur_name = "";
    $u_id = "my";
    $user = \App\User::find($id);

    if(!empty($user)){

        $name = $user->u_name_th;
        $sur_name = $user->sur_name_th;
        $u_id = $user->u_id;
    }
    $breadcrumbs->parent('profile.index');
    $breadcrumbs->push($name .' ' . $sur_name, route('profile.edit', $u_id));
});


/*
 * Research
 * */

Breadcrumbs::register('research.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('ผลงานวิชาการ', route('research.index'));
});

Breadcrumbs::register('research.create', function($breadcrumbs)
{
    $breadcrumbs->parent('profile.show',Auth::id());
    $breadcrumbs->push('เพิ่มข้อมูลงานวิจัย', route('research.create'));
});

/*
 * Journal
 * */

Breadcrumbs::register('journal.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('รายการโครงงานวิจัย', route('journal.index'));
});

Breadcrumbs::register('journal.create', function($breadcrumbs)
{

    $breadcrumbs->parent('profile.show',Auth::id());
    $breadcrumbs->push('เพิ่มผลงานวารสารวิชาการ', route('journal.create'));
});

Breadcrumbs::register('journal.edit', function($breadcrumbs,$id)
{
    $breadcrumbs->parent('profile.show',Auth::id());
    $breadcrumbs->push('แก้ไขผลงานวารสารวิชาการ', route('journal.edit',$id));
});

Breadcrumbs::register('journal.show', function($breadcrumbs,$id)
{
    $journal = \App\UserresearchModel::with(['journal','user'])->where('rj_id',$id)->first();

    $breadcrumbs->parent('profile.show',$journal->user->u_id);
    $breadcrumbs->push('ข้อมูลวารสารวิชาการ', route('journal.show',$journal->journal->rj_id ));
});




