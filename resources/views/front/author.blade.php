<!DOCTYPE html>
<html>

<head>

  <x-head></x-head>

</head>

<body class="font-[Poppins] pb-[83px]">

  <x-navbar></x-navbar>

  <nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center gap-4 mt-[30px]">

    @foreach ($categories as $category)
    <a href="{{ route('front.category', $category->slug) }}" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
      <div class="w-6 h-6 flex shrink-0">
        <img src="{{Storage::url($category->icon)}}" alt="icon" />
      </div>
      <span>{{ $category->name }}</span>
    </a>
    @endforeach

  </nav>

  <section id="author" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px]">
    <div id="title" class="flex items-center gap-[30px]">
      <h1 class="text-4xl leading-[45px] font-bold">Author News</h1>
      <h1 class="text-4xl leading-[45px] font-bold">/</h1>
      <div class="flex gap-3 items-center">
        <div class="w-[60px] h-[60px] flex shrink-0 rounded-full overflow-hidden">
          <img src="{{ Storage::url($author->avatar) }}" alt="profile photo" />
        </div>
        <div class="flex flex-col">
          <p class="text-lg leading-[27px] font-semibold">{{ $author->name }}</p>
          <span class="text-[#A3A6AE]">{{ $author->occupation }}</span>
        </div>
      </div>
    </div>
    <div id="content-cards" class="grid grid-cols-3 gap-[30px]">

      @forelse ($author->news as $item_news)
      <a href="{{ route('front.details', $item_news->slug) }}" class="card">
        <div
          class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
          <div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
            <div
              class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
              <p class="text-xs leading-[18px] font-bold">{{ $item_news->category->name }}</p>
            </div>
            <img src="{{ Storage::url($item_news->thumbnail) }}" alt="thumbnail photo"
              class="w-full h-full object-cover" />
          </div>
          <div class="flex flex-col gap-[6px]">
            <h3 class="text-lg leading-[27px] font-bold">{{ substr($item_news->name, 0, 40) }}{{ strlen($item_news->name) > 40 ? '...' : '' }}</h3>
            <p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $item_news->updated_at->format('d M Y') }}</p>
          </div>
        </div>
      </a>
      @empty
      <div class="col-span-3 text-center">
        <p class="text-lg font-semibold text-gray-500">Belum ada berita pada author ini.</p>
      </div>
      @endforelse

    </div>
  </section>
  <section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px]">
    <div class="flex flex-col gap-3 shrink-0 w-fit">
      <a href="{{ $bannerAds->link }}" target="_blank" rel="noopener noreferrer">
        <div class="w-[900px] h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
          <img src="{{ Storage::url($bannerAds->thumbnail)}}" class="object-cover w-full h-full" alt="ads" />
        </div>
      </a>
      <p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
        Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
            src="{{asset('assets/images/icons/message-question.svg')}}" alt="icon" /></a>
      </p>
    </div>
  </section>
</body>

</html>