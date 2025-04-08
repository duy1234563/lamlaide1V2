<?php
namespace App\Http\Controllers;
use App\Models\Order;
use App\Http\Requests\FoodRequest;
use App\Models\Fruit;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FruitController extends Controller
{
       // Phương thức GET để hiển thị form đặt hàng
       public function dathang($id) {
        $fruit = Fruit::findOrFail($id);
        return view('dathang', compact('fruit'));
    }

    // Phương thức POST để xử lý đơn hàng
  
public function dathang1(Request $request)
{
    // Validate dữ liệu từ form
    $validated = $request->validate([
        'customer_name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string',
        'note' => 'nullable|string',
        'fruit_id' => 'required|exists:fruits,id',
    ]);

    // Tạo đơn hàng
    $order = Order::create([
        'customer_name' => $validated['customer_name'],
        'phone' => $validated['phone'],
        'address' => $validated['address'],
        'note' => $validated['note'] ?? null,
        'fruit_id' => $validated['fruit_id'],
    ]);

    // Chuyển hướng về trang đặt hàng với thông báo thành công
    return redirect()->route('orders.dathang', $validated['fruit_id'])->with('success', 'Order placed successfully!');
}
    
    public function index(Request $request)
    {
        $query = Fruit::with('category');
    
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
    
        $fruits = $query->get()->groupBy('category.name');
        $categories = Category::all();
    
        return view('index', compact('fruits', 'categories'));
    }
    
    public function danhsach(Request $request)
    {
        $query = Fruit::with('category');

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $fruits = $query->get();

        return view('danhsach', compact('fruits'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }
    

    public function store(FoodRequest $request)
{
    $imagePath = null;

    // Xử lý upload hình ảnh
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $destinationPath = public_path('imgthucpham');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0775, true);
        }

        $image->move($destinationPath, $imageName);
        $imagePath = 'imgthucpham/' . $imageName;
    }

    // **Chỗ này đặt Fruit::create(...)**
    Fruit::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'image' => $imagePath,
    ]);

    return redirect()->route('fruits.index')->with('success', 'Thêm trái cây thành công!');
}


public function show($id)
{
    $fruit = Fruit::findOrFail($id); // Tìm thực phẩm theo ID, báo lỗi nếu không tìm thấy
    return view('chitietthucpham', compact('fruit')); // Trả về view với biến fruit
}

    public function edit($id)
    {
        $fruit = Fruit::findOrFail($id);
        $categories = Category::all();
        return view('edit', compact('fruit', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $fruit = Fruit::findOrFail($id);

        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Cập nhật dữ liệu
        $fruit->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('fruits.index')->with('success', 'Cập nhật trái cây thành công!');
    }

    
    public function destroy(Fruit $fruit)
    {
        if ($fruit->image) {
            $imagePath = public_path($fruit->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $fruit->delete();
        return redirect()->route('fruits.index')->with('success', 'Xóa trái cây thành công!');
    }
}
