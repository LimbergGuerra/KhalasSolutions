<form action="{{ route('reservations.updateStatus', $reservation->id) }}" method="POST">
    @csrf
    @method('POST') <!-- Si usas PATCH, Laravel podría rechazarlo -->
    
    <select name="status" required>
        <option value="pending">Pendiente</option>
        <option value="in_process">En Proceso</option>
        <option value="completed">Completado</option>
        <option value="cancelled">Cancelado</option>
    </select>
    
    <button type="submit">Actualizar Estado</button>
</form>
