<?php

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function with(): array
    {
        // Menggunakan logika pencarian teman Anda dengan tambahan Eager Loading 'user' agar cepat
        $products = Product::when($this->search, function ($query) {
            return $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%');
        })->latest()->paginate(10);

        return [
            'products' => $products,
        ];
    }
}; ?>

<div>
    <!-- Search Bar Modern -->
    <div class="row mb-4 align-items-center">
        <div class="col-md-12">
            <div class="input-group search-group shadow-sm">
                <span class="input-group-text bg-white border-0 ps-3">
                    <i class="bi bi-search text-primary"></i>
                </span>
                <input type="text" wire:model.live.debounce.300ms="search"
                    placeholder="Cari nama atau deskripsi produk..." 
                    class="form-control border-0 py-2 shadow-none">
            </div>
        </div>
    </div>

    <!-- Tabel Produk dengan Desain Soft -->
    <div class="table-card border-0 shadow-sm rounded-4">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Produk</th>
                        <th>Info Detail</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td class="text-center text-muted fw-medium">
                                {{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}
                            </td>
                            <td>
                                <img src="{{ asset('/storage/products/' . $product->image) }}" 
                                     class="product-img border shadow-sm" alt="img">
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $product->title }}</div>
                                <small class="text-muted small">ID: #PRD-{{ $product->id }}</small>
                            </td>
                            <td>
                                <span class="fw-bold text-indigo">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $product->stock > 10 ? 'bg-primary-subtle text-primary' : 'bg-danger-subtle text-danger' }} px-3 py-2 rounded-pill">
                                    {{ $product->stock }} Unit
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn-action btn-view"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn-action btn-edit"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-search fs-1 d-block mb-2 opacity-25"></i>
                                Tidak ada produk yang cocok dengan "{{ $search }}"
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($products->hasPages())
            <div class="p-4 border-top">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>