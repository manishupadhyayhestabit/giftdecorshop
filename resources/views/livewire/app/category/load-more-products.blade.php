<div class="mx-auto"
    x-data = "{
		checkScroll(){
			window.onscroll = function(ev) {
				if ((window.innerHeight + window.scrollY) >= document.body.scrollHeight) {
					@this.loadMore(); 
				}
			};
		}
	}"
	x-init = "checkScroll"
>
   <button wire:click="loadMore" class="btn btn-success btn-sm">Load More Products</button>
</div>
