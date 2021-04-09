<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
use Illuminate\Http\Request;
use App\Http\Requests\AnswerRequest;
use Auth;
use Intervention\Image\Facades\Image;

class GuestbookController extends Controller
{
    private $image = null;


    public function answer(AnswerRequest $request)
    {

        if ($request->hasFile('picture')) {
            $check = $this->checkPicture($request->file('picture'));
            if ($check !== true)
                return response()->json([
                    'errors' => [
                        'picture' => [$check]
                    ]
                ], 422);
        }

        try {
            $message = new Guestbook();
            $message->message = $request->get('message');
            $message->user()->associate(Auth::id());
            $message->parent_id = $request->get('parent_id');
            $message->save();

            if ($this->image) {
                $this->image->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save('images/pics/' . $message->id . '.jpg');
            }

            if ($request->hasFile('picture')) {
                $img = Image::make($request->file('picture'));

                $img->resize(300, 200);
            }

            return response()->json([
                'status' => 1
            ], 200);
        } catch (JsonException $e) {
            return response()->json([
                'errors' => $e->getMessage()
            ], 200);
        }
    }

    private function checkPicture($file)
    {
        if (!preg_match('/png|jpg|jpeg|gif/', $file->extension()))
            return 'Возможна загрузка только изображений ';

        $this->image = Image::make($file);

        if ($this->image->width() > 10000)
            return 'Слишком большое изображение';

        if ($this->image->height() > 10000)
            return 'Слишком большое изображение';

        if ($this->image->width() < 100)
            return 'Слишком маленькое изображение';

        if ($this->image->height() < 100)
            return 'Слишком маленькое изображение';


        return true;
    }

    public function edit($id)
    {
        $message = Guestbook::find($id);

        $check = $this->checkEdit($message);
        if ($check !== true)
            return response()->json([
                'errors' => [
                    'edit' => [$check]
                ]
            ], 422);

        return response()->json([
            'tpl' => view('forms.answer', ['message' => $message])->render()
        ]);
    }


    private function checkEdit($message)
    {
        if (!$message)
            return 'Ошибка выборки комментария';

        if (!Auth::check() || $message->user_id != Auth::id())
            return 'Нельзя отредактировать этот комментарий';

        if ($message->childrens()->count())
            return 'Нельзя отредактировать комментарий на который ответили';

        return true;
    }

    public function update(AnswerRequest $request)
    {

        if ($request->hasFile('picture')) {
            $check = $this->checkPicture($request->file('picture'));
            if ($check !== true)
                return response()->json([
                    'errors' => [
                        'picture' => [$check]
                    ]
                ], 422);
        }

        try {
            $message = Guestbook::find($request->get('id'));
            if (!$message)
                return response()->json([
                    'errors' => [
                        'picture' => ['Ошибка выборки комментария']
                    ]
                ], 422);

            $message->message = $request->get('message');
            $message->save();

            if ($this->image) {
                $this->image->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save('images/pics/' . $message->id . '.jpg');
            }

            if ($request->hasFile('picture')) {
                $img = Image::make($request->file('picture'));

                $img->resize(300, 200);
            }

            return response()->json([
                'status' => 1
            ], 200);
        } catch (JsonException $e) {
            return response()->json([
                'errors' => $e->getMessage()
            ], 200);
        }
    }
}
