<style>
    #grand{
        position: fixed;
        z-index: 1000000;
        background-color: black;
        width: 100%;
        height: 100vh;
    }
    .finished{
        display: none !important;
    }
</style>
<div id="grand">

</div>
<script>
    // Check if the page is still loading
    function isPageLoading() {
        return document.readyState === 'loading';
    }

    // Add an event listener to check when the page finishes loading
    window.addEventListener('load', function() {
        if (isPageLoading()) {
            console.log('Page is still loading resources.');
        } else {
            document.getElementById("grand").classList.add("finished");
        }
    });
</script>