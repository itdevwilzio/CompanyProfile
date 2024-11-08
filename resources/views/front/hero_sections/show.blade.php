@extends('front.layouts.app')

@section('content')
<!-- Full Screen Wave and Particle Section -->
<div id="header" class="relative w-full overflow-hidden bg-[#0E3995]">
    <!-- Container for Carousel and Particles -->
    <div class="container max-w-[1130px] mx-auto relative pt-2 z-10 main-carousel">
        <x-navbar></x-navbar>

        <!-- Wave SVG Positioned Above the Carousel but outside the container -->
        <div class="wave-container w-full absolute top-0 left-0 z-[-1]">


        </div>

    <!-- Carousel Section -->
    <section id="wave-particles" class="relative w-full h-auto overflow-hidden mt-4">
        <!-- Carousel Container -->
        <div class="carousel-container mt-4 relative overflow-hidden rounded-xl shadow-lg">
            <!-- Carousel Wrapper -->
            <div class="carousel w-full" data-flickity='{ "wrapAround": true, "autoPlay": 4000, "prevNextButtons": true, "pageDots": true, "pauseAutoPlayOnHover": true }'>
                @foreach ($hero_section as $hero)
                <!-- Link to Hero Section Detail Page -->
                <a href="{{ route('hero_sections.show', $hero->id) }}" class="carousel-cell w-full h-[400px] md:h-[500px] lg:h-[600px]">
                    <div class="relative w-full h-full flex justify-center items-center">
                        <img src="{{ Storage::url($hero->banner) }}"
                             srcset="{{ Storage::url($hero->banner) }} 1024w,
                                     {{ Storage::url($hero->banner) }} 640w"
                             sizes="(max-width: 768px) 640px, 1024px"
                             class="object-cover w-[800px] h-auto rounded-lg shadow-lg" alt="Promo Banner: {{ $hero->description }}" loading="lazy">
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

        <!-- CSS for Carousel and Wave -->
        <style>
            .wave-container {
                position: relative;
                width: 100%;
                height: auto;
            }

            .carousel-container {
                position: relative;
                z-index: 2;
            }

            .carousel {
                margin-top: 0;
            }
        </style>



        <!-- CSS for Particles -->
        <style>
            .wave-container {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1
            }

            .particle {
                position: absolute;
                background-color: rgba(255, 255, 255, 0.8);
                border-radius: 50%;
                animation: float 6s infinite ease-in-out;
            }

            @keyframes float {
                0% { transform: translateY(0) translateX(0); opacity: 1; }
                25% { transform: translateY(-20px) translateX(-10px); opacity: 0.8; }
                50% { transform: translateY(10px) translateX(15px); opacity: 0.6; }
                75% { transform: translateY(-15px) translateX(-15px); opacity: 0.8; }
                100% { transform: translateY(0) translateX(0); opacity: 1; }
            }
        </style>

    </div>
</div>









<script>
    function closeModalThumbnail(index) {
        document.getElementById('modal-' + index).classList.add('hidden');
    }

    // Fullscreen Toggle
    function toggleFullscreen(index) {
        const modal = document.getElementById('modal-' + index);
        if (!document.fullscreenElement) {
            modal.requestFullscreen().catch(err => console.log(err));
        } else {
            document.exitFullscreen();
        }
    }

    // Zoom In Functionality
    function zoomIn(index) {
        const img = document.getElementById('image-' + index);
        let currentWidth = img.clientWidth;
        img.style.width = currentWidth + 100 + "px"; // Increase width by 100px
    }

    // Zoom Out Functionality
    function zoomOut(index) {
        const img = document.getElementById('image-' + index);
        let currentWidth = img.clientWidth;
        img.style.width = currentWidth - 100 + "px"; // Decrease width by 100px
    }

    // Share Image to Social Media (Using Web Share API if supported)
    function shareImage(index) {
    const imgSrc = document.getElementById('image-' + index).src;
        if (navigator.share) {
            navigator.share({
                title: 'Check out this image!',
                text: 'Here is a testimonial image from our client.',
                url: imgSrc
            }).then(() => {
                console.log('Image shared successfully');
            }).catch(err => console.log('Error sharing the image:', err));
        } else {
            alert('Sharing is not supported on your browser.');
        }
    }

    function shareToTwitter(index, fileUrl) {
        const url = encodeURIComponent(fileUrl);
        const text = encodeURIComponent('Check out this testimonial!');
        window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank');
    }

    function shareToWhatsApp(index, fileUrl) {
        const url = encodeURIComponent(fileUrl);
        window.open(`https://wa.me/?text=${url}`, '_blank');
    }

    function downloadImage(index, fileUrl) {
        const link = document.createElement('a');
        link.href = fileUrl;
        link.download = 'testimonial-thumbnail.jpg';
        link.click();
    }

    function openModalTestimonial(index) {
        const modal = document.getElementById(`modal-testimonial-${index}`);
        if (modal) {
            modal.classList.remove('hidden')
            modal.classList.add('flex')
            modal.style.display = 'flex';

            lightGallery(document.getElementById(`lightgallery-thumbnail-${index}`), {
                plugins: [lgFullscreen, lgZoom, lgShare],
                mode: 'lg-fade',
                speed: 500,
                zoom: true,
                share: true,
                fullscreen: true,
                preload: 1,
            });
        }
    }

    function closeModalTestimonial(index) {
        const modal = document.getElementById(`modal-testimonial-${index}`);
        if (modal) {
            modal.classList.remove('flex')
            modal.classList.add('hidden')
            modal.style.display = 'none';
        }
    }

    function openModalThumbnail(index) {
   const modal = document.getElementById(`modal-${index}`);
    if (modal) {
        // Show the modal by changing its classes and styles
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        modal.style.display = 'flex';

        // Initialize LightGallery for the thumbnail modal
        const galleryElement = document.getElementById(`lightgallery-thumbnail-${index}`);

        // Ensure that LightGallery is initialized only once
        if (!galleryElement.lightGalleryInstance) {
            galleryElement.lightGalleryInstance = lightGallery(galleryElement, {
                plugins: [lgFullscreen, lgZoom, lgShare], // Optional for commercial use
                mode: 'lg-fade',
                speed: 500,
                zoom: true,
                share: true,
                fullscreen: true,
                preload: 1,
            });
        } else {
            // If already initialized, just refresh the gallery
            galleryElement.lightGalleryInstance.refresh();
        }
    }
    }

    function closeModalThumbnail(index) {
        const modal = document.getElementById(`modal-${index}`);
        if (modal) {
            modal.classList.remove('flex')
            modal.classList.add('hidden')
            modal.style.display = 'none';
        }

        // Destroy LightGallery when the modal is closed
        const galleryInstance = document.getElementById(`lightgallery-thumbnail-${index}`);
        if (galleryInstance && galleryInstance.lgData) {
            galleryInstance.lgData.destroy(true);
        }
    }
</script>

{{-- Modal Script --}}
@push('after-scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to show the modal
        const showModal = (modalId) => {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden');
            }
        };

        // Function to hide the modal
        const hideModal = (modalId) => {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
            }
        };

        // Open modal when the trigger is clicked
        document.querySelectorAll('.modal-open').forEach(trigger => {
            trigger.addEventListener('click', function () {
                const modalId = trigger.getAttribute('data-modal-target');
                showModal(modalId);
            });
        });

        // Close modal when the close button or the overlay is clicked
        document.querySelectorAll('.modal-close').forEach(closeButton => {
            closeButton.addEventListener('click', function () {
                const modalId = closeButton.getAttribute('data-modal-toggle');
                hideModal(modalId);
            });
        });

        // Close modal when clicking outside the modal content
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    });

    function ShowHideShare(event, i) {
        event.preventDefault();
        
    let dropshare = event.target.nextElementSibling;
    console.log(dropshare)

        dropshare.classList.toggle("hidden");
    }
</script>
@endpush

@push('styles')
<style>
.modal {
    display: none;
}

.modal-open {
    display: block;
}

.modal-overlay {
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-container {
    position: relative;
    max-width: 500px;
    margin: 0 auto;
    padding: 1rem;
}

.modal-content {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}

.modal-header {
    position: relative;
}

.modal-close {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
}
</style>
@endpush

<!-- Footer Section -->

<footer class="w-full mt-10 bg-[#0E3995] text-white">
    <div class="container max-w-7xl mx-auto flex flex-col items-center justify-center py-10">
        <!-- Follow Us Section -->
        <p id="CompanyName" class="font-nunito font-bold text-lg mb-4">
            Ikuti Kami
        </p>
        <div class="flex items-center gap-6 mb-6">
            <a href="https://www.facebook.com/share/GjZJNGmKbkjyumXs/" target="_blank">
                <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center transform hover:scale-110 transition-all duration-300 ease-in-out">
                    <svg class="w-5 h-5 text-[#0E3995] fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M22.675 0H1.325C.594 0 0 .594 0 1.326v21.348C0 23.406.594 24 1.326 24H12.82v-9.294H9.691V11.29h3.128V8.717c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.796.143v3.244l-1.918.001c-1.504 0-1.795.714-1.795 1.763v2.311h3.587l-.467 3.416h-3.12V24h6.116c.729 0 1.324-.594 1.324-1.326V1.326C24 .594 23.406 0 22.675 0z"/>
                    </svg>
                </div>
            </a>
            <a href="https://www.instagram.com/official.wilzio/profilecard/?igsh=MW9zazBtYjhmaGEyNg==" target="_blank">
                <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center transform hover:scale-110 transition-all duration-300 ease-in-out">
                    <svg class="w-5 h-5 text-[#0E3995] fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 2.163c3.204 0 3.584.012 4.849.07 1.366.062 2.633.334 3.608 1.309.975.976 1.247 2.243 1.309 3.608.058 1.265.07 1.645.07 4.849s-.012 3.584-.07 4.849c-.062 1.366-.334 2.633-1.309 3.608-.976.975-2.243 1.247-3.608 1.309-1.265.058-1.645.07-4.849.07s-3.584-.012-4.849-.07c-1.366-.062-2.633-.334-3.608-1.309-.975-.976-1.247-2.243-1.309-3.608-.058-1.265-.07-1.645-.07-4.849s.012-3.584.07-4.849c.062-1.366.334-2.633 1.309-3.608.976-.975 2.243-1.247 3.608-1.309 1.265-.058 1.645-.07 4.849-.07m0-2.163C8.755 0 8.333.014 7.052.072 5.766.129 4.557.352 3.607 1.302 2.656 2.253 2.433 3.461 2.376 4.747.418 8.302.418 15.698 2.376 19.253c.057 1.286.28 2.494 1.231 3.444.95.951 2.159 1.173 3.445 1.23 1.281.058 1.703.072 4.848.072s3.567-.014 4.848-.072c1.286-.057 2.494-.279 3.445-1.23.951-.95 1.174-2.158 1.231-3.444.058-1.281.072-1.703.072-4.848s-.014-3.567-.072-4.848c-.057-1.286-.28-2.494-1.231-3.444-.951-.951-2.159-1.173-3.445-1.23-1.281-.058-1.703-.072-4.848-.072zm0 5.838c-3.403 0-6.163 2.76-6.163 6.163s2.76 6.163 6.163 6.163 6.163-2.76 6.163-6.163-2.76-6.163-6.163-6.163zm0 10.123c-2.185 0-3.96-1.775-3.96-3.96s1.775-3.96 3.96-3.96 3.96 1.775 3.96 3.96-1.775 3.96-3.96 3.96zm6.406-11.845c-.796 0-1.443-.647-1.443-1.443s.647-1.443 1.443-1.443 1.443.647 1.443 1.443-.647 1.443-1.443 1.443z"/>
                    </svg>
                </div>
            </a>
            <a href="https://wa.me/6285179709387" target="_blank" rel="noopener noreferrer">
                <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center transform hover:scale-110 transition-all duration-300 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#0E3995] fill-current" viewBox="0 0 32 32">
                        <path fill="currentColor" d="M16.002 0C7.164 0 0 7.164 0 16c0 3.074.838 6.06 2.429 8.678l-1.621 6.055a1.177 1.177 0 0 0 1.427 1.427l6.055-1.621A15.946 15.946 0 0 0 16.002 32c8.836 0 16-7.164 16-16 0-8.836-7.164-16-16-16zm9.373 23.873c-.401 1.129-2.012 2.145-2.769 2.243-.756.098-1.429.512-4.827-.998-4.074-1.795-6.616-6.322-6.813-6.619-.197-.295-1.63-2.168-1.63-4.131 0-1.964 1.037-2.936 1.402-3.34.365-.404.803-.512 1.071-.512.268 0 .536.001.768.014.238.015.564-.09.888.677.324.768 1.103 2.658 1.202 2.853.099.197.164.438.014.731-.148.295-.223.473-.438.768-.217.295-.46.66-.64.883-.218.275-.444.573-.193.945.25.372 1.109 1.822 2.383 2.945 1.641 1.454 2.988 1.926 3.368 2.13.379.205.599.184.821-.11.223-.295 1.027-1.25 1.301-1.68.274-.43.547-.357.914-.223.367.134 2.339 1.102 2.744 1.29.405.188.677.29.776.451.1.163.1.965-.301 2.094z"/>
                    </svg>
                </div>
            </a>
            <a href="https://www.youtube.com/@official.wilzio" target="_blank">
                <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center transform hover:scale-110 transition-all duration-300 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#0E3995] fill-current" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M23.499 6.203c-.273-1.032-1.077-1.837-2.109-2.109C19.528 3.5 12 3.5 12 3.5s-7.528 0-9.39.594c-1.032.273-1.837 1.077-2.109 2.109C0 8.064 0 12 0 12s0 3.936.501 5.797c.273 1.032 1.077 1.837 2.109 2.109C4.472 20.5 12 20.5 12 20.5s7.528 0 9.39-.594c1.032-.273 1.837-1.077 2.109-2.109.501-1.861.501-5.797.501-5.797s0-3.936-.501-5.797zm-13.908 9.44V8.358l6.253 3.643-6.253 3.642z"/>
                    </svg>
                </div>
            </a>
            <a href="https://www.tiktok.com/@official.wilzio?_t=8qmDlonzcQ5&_r=1" target="_blank">
                <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center transform hover:scale-110 transition-all duration-300 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#0E3995] fill-current" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.245V2h-3.445v13.672a2.896 2.896 0 0 1-5.201 1.743l-.002-.001.002.001a2.895 2.895 0 0 1 3.183-4.51v-3.5a6.329 6.329 0 0 0-5.394 10.692 6.33 6.33 0 0 0 10.857-4.424V8.687a8.182 8.182 0 0 0 4.773 1.526V6.79a4.831 4.831 0 0 1-1.003-.104z"/>
                    </svg>
                </div>
            </a>
        </div>
        <!-- Copyright Section -->
        <p class="text-sm text-white">
            &copy; {{ date('Y') }} wilzio.com 
    </div>
</footer>


@endsection

