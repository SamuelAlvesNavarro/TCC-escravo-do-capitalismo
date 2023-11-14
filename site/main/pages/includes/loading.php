<style>
    #grand{
        position: fixed;
        z-index: 1000000;
        background-color: black;
        width: 100%;
        height: 100vh;
        background-color: #121212;
    }
    .finished{
        display: none !important;
    }
    .Loading {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 100000;
}
.Loading .spinner {
    animation: rotator 2s linear infinite;
}
@keyframes  rotator{
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(270deg);
    }
}
.Loading .path {
    stroke-dasharray: 200;
    stroke-dashoffset: 0;
    transform-origin: center;
    stroke: rgb(179, 14, 8);
    animation: dash 2s ease-in-out infinite;
}
@keyframes dash {
    0% {
    stroke-dashoffset: 200;
    
}

50% {
    stroke-dashoffset: 46.75;
    transform: rotate(135deg);
}
100% {
    stroke-dashoffset: 200;
    transform: rotate(450deg);
}
}

</style>
<div id="grand">
    <div class="Loading">
        <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30">
                
            </circle>
        </svg>
    </div>
</div>
<script>
    function load(){
        document.getElementById("grand").classList.remove("finished");
    }
    // Check if the page is still loading
    function isPageLoading() {
        return document.readyState === 'loading';
    }

    // Add an event listener to check when the page finishes loading
    window.addEventListener('load', function() {
        if (isPageLoading()) {
            load()
        } else {
            document.getElementById("grand").classList.add("finished");
        }
    });
</script>