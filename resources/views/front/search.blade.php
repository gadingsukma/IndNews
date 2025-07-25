<!DOCTYPE html>
<html>

<x-head></x-head>

<body class="font-[Poppins]">

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

  <!-- <section id="heading" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px]">
    <h1 class="text-4xl leading-[45px] font-bold text-center">
      Explore Hot Trending <br />
      Good News Today
    </h1>

    <form action="#">
      <label for="search-bar" class="w-[500px] flex p-[12px_20px] transition-all duration-300 gap-[10px] ring-1 ring-[#E8EBF4] focus-within:ring-2 focus-within:ring-[#FF6B18] rounded-[50px] group">
        <div class="w-5 h-5 flex shrink-0">
          <img src="assets/images/icons/search-normal.svg" alt="icon" />
        </div>
        <input
          autocomplete="off"
          type="text"
          id="search-bar"
          name="search-bar"
          placeholder="Search hot trendy news today..."
          class="appearance-none font-semibold placeholder:font-normal placeholder:text-[#A3A6AE] outline-none focus:ring-0 w-full" />
      </label>
    </form>

  </section> -->

  <section id="search-result" class="max-w-[1130px] mx-auto flex items-start flex-col gap-[30px] mt-[70px] mb-[100px]">
    <h2 class="text-[26px] leading-[39px] font-bold">Search Result: <span>{{ ucfirst($keyword) }}</span></h2>
    <div id="search-cards" class="grid grid-cols-3 gap-[30px]">

      @forelse ($articles as $article)
      <a href="details.html" class="card">
        <div class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
          <div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
            <div class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
              <p class="text-xs leading-[18px] font-bold">{{ $article->category->name }}</p>
            </div>
            <img src="{{ Storage::url($article->thumbnail) }}" alt="thumbnail photo" class="w-full h-full object-cover" />
          </div>
          <div class="flex flex-col gap-[6px]">
            <h3 class="text-lg leading-[27px] font-bold">{{ substr($article->name, 0, 40) }}{{ strlen($article->name) > 40 ? '...' : '' }}</h3>
            <p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $article->updated_at->format('d M Y') }}</p>
          </div>
        </div>
      </a>
      @empty
      <p>Belum ada artikel tersebut</p>
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