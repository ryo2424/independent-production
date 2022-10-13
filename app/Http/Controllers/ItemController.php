<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);
            // 画像ファイルの保存場所指定
             $img = $request->image->store('public/storage');
             $inputs=request('image')->storeAs('public/storage', $img);
            // $filename=request()->file('image')->getClientOriginalName();
            // $inputs['image']=request('image')->storeAs('public/storage', $filename);
            // 商品登録
            
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'price' => $request->price,
                'file_path' => $inputs,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }


    public function edit($id)
    {
    #レコードをidで指定
    //use App\Models\item;
    $items= item::find($id);
    #viewに連想配列を渡す
    return view('item.edit',['message' => '編集フォーム','items' => $items]);
    }


        #DBの更新処理
        public function update(Request $request,$id)
        {
            $item = item::find($id);
            $item->name = $request->name;
            $item->type = $request->type;
            $item->price = $request->price;
            $item-> file_path= $request->file_path;
            $item->save();
        
            return redirect('/items');
        }

    /**
         * 削除処理
         */
        public function destroy(Request $request, Item $Item)
        {
            $Item->delete();
            return redirect('/items');
        }

        public function upload(Request $request)
        {
            // storageディレクトリ内のapp>public>sampleに保存
            $dir = 'sample';
    
            // sampleディレクトリに画像を保存
            $request->file('image')->store('public/' . $dir);
    
            return redirect('/items');
        }

        public function addImage(Request $request){
            $img = $request->image->store('public');  //$request->imageで画像の名前を取得しています。そしてstoreメソッドでstorage/publicに画像を保存しています。
            Item::create([
            'file_path' => $img
            ]);
            return view('item.edit'); 
        }
        // table('file_path')->
        // Item::create([
        //     'user_id' => Auth::user()->id,
        //     'name' => $request->name,
        //     'type' => $request->type,
        //     'price' => $request->price,
        //     'detail' => $request->detail,
        // ]);
}


