<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function getAllTeamWithMember(){
        return Team::with('Member:name,id,users.type')->get();
    }
}
