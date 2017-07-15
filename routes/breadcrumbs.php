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

/*
 * Conference
 * */


Breadcrumbs::register('conference.create', function($breadcrumbs)
{

    $breadcrumbs->parent('profile.show',Auth::id());
    $breadcrumbs->push('เพิ่มการประชุมวิชาการ', route('conference.create'));
});

Breadcrumbs::register('conference.edit', function($breadcrumbs,$id)
{
    $breadcrumbs->parent('profile.show',Auth::id());
    $breadcrumbs->push('แก้ไขการประชุมวิชาการ', route('conference.edit',$id));
});

Breadcrumbs::register('conference.show', function($breadcrumbs,$id)
{
    try {
        $conference = \App\UserresearchModel::with([ 'conference', 'user' ])->where('rc_id', $id)->first();
        $breadcrumbs->parent('profile.show',$conference->user->u_id);
        $breadcrumbs->push('ข้อมูลวารสารวิชาการ', route('conference.show',$conference->conference->rc_id ));
    }catch (exception $e){

    }


});

/*
 * Project
 * */

Breadcrumbs::register('project.create', function($breadcrumbs)
{

    $breadcrumbs->parent('profile.show',Auth::id());
    $breadcrumbs->push('เพิ่มข้อมูลโครงการวิจัย', route('project.create'));
});

Breadcrumbs::register('project.edit', function($breadcrumbs,$id)
{
    $breadcrumbs->parent('profile.show',Auth::id());
    $breadcrumbs->push('แก้ไขโครงการวิจัย', route('project.edit',$id));
});

Breadcrumbs::register('project.show', function($breadcrumbs,$id)
{
    $project = \App\UserresearchModel::with(['project','user'])->where('rp_id',$id)->first();

    $breadcrumbs->parent('profile.show',$project->user->u_id);
    $breadcrumbs->push('ข้อมูลโครงการวิจัย', route('project.show',$project->project->rp_id ));
});



/*
 * Patent
 * */

Breadcrumbs::register('patent.create', function($breadcrumbs)
{

    $breadcrumbs->parent('profile.show',Auth::id());
    $breadcrumbs->push('เพิ่มข้อมูลสิทธิบัตร', route('patent.create'));
});

Breadcrumbs::register('patent.edit', function($breadcrumbs,$id)
{
    $breadcrumbs->parent('profile.show',Auth::id());
    $breadcrumbs->push('แก้ไขข้อมูลสิทธิบัตร', route('patent.edit',$id));
});

Breadcrumbs::register('patent.show', function($breadcrumbs,$id)
{
    $patent = \App\UserresearchModel::with(['patent','user'])->where('pt_id',$id)->first();

    $breadcrumbs->parent('profile.show',$patent->user->u_id);
    $breadcrumbs->push('ข้อมูลสิทธิบัตร', route('patent.show',$patent->patent->pt_id ));
});


