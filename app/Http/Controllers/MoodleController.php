<?php
namespace App\Http\Controllers;

use App\Services\MoodleService;
use Illuminate\Http\Request;

class MoodleController extends Controller
{
    protected MoodleService $moodle;

    public function __construct(MoodleService $moodle)
    {
        $this->moodle = $moodle;
    }

    /** Ejemplo: mostrar todos los cursos del sitio */
    public function cursos()
    {
        // Llamamos al WS core_course_get_courses
        $data = $this->moodle->call('core_course_get_courses', []);
        // $data normalmente viene como ['courses'=>[...]]
        $cursos = $data['courses'] ?? [];
        return view('moodle.cursos', compact('cursos'));
    }

    /** Otro ejemplo: listado de cursos de un usuario */
    public function misCursos(Request $req)
    {
        $userId = $req->input('userid', 2);
        $data = $this->moodle->call('core_enrol_get_users_courses', ['userid' => $userId]);
        return view('moodle.cursos', ['cursos' => $data]);
    }

    /** Mostrar las categorías de cursos */
    public function categorias()
    {
        $data = $this->moodle->call('core_course_get_categories', []);
        $categorias = $data['categories'] ?? $data;
        return view('moodle.categorias', compact('categorias'));
    }

    /** Buscar usuarios por email o nombre */
    public function buscarUsuarios(Request $request)
    {
        $query = $request->input('query', '');
        $data = $this->moodle->call('core_user_get_users', [
            'criteria[0][key]' => 'search',
            'criteria[0][value]' => $query,
        ]);
        $users = $data['users'] ?? [];
        return view('moodle.usuarios', compact('users', 'query'));
    }
}
