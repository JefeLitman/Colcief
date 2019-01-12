<div class="contenedor_carga" id="contenedor_carga" >
    <svg class="loader" id="carga" viewBox="0 0 340 340">
        <circle cx="170" cy="170" r="160" stroke="#1e88e5"/>
        <circle cx="170" cy="170" r="135" stroke="#404041"/>
        <circle cx="170" cy="170" r="110" stroke="#1e88e5"/>
        <circle cx="170" cy="170" r="85" stroke="#404041"/>
    </svg>
</div>

<script>
    window.onload = function verPag(){
        document.getElementById('contenedor_carga').style.display = 'none';
        document.getElementById('ver').style.display = 'block';
        //document.getElementById('ver').style.owerflow = 'scroll'
    }
    {{-- window.onload = function()
    {
        document.getElementById('contenedor_carga').style.display = 'none';
    } --}}
</script>
