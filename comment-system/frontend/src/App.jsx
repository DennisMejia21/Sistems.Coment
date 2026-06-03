import React, { useState } from "react";

function App() {
  // 1. LA MEMORIA (El Estado)
  const [comentarios, setComentarios] = useState([
    "¡Primer comentario de prueba! 🔥",
    "React está buenísimo."
  ]);
  
  const [nuevoTexto, setNuevoTexto] = useState("");

  // 2. LA ACCIÓN (La Función)
  const GuardarComentario = (e) => {
    e.preventDefault(); // Detiene la recarga de página de toda la vida
    if (nuevoTexto.trim() === "") return;

    // Agrega lo escrito a la lista
    setComentarios([...comentarios, nuevoTexto]); 
    setNuevoTexto(""); // Limpia la caja de texto
  };

  // 3. LO QUE VE EL USUARIO (La Pantalla)
  return (
    <div style={{ padding: "30px", fontFamily: "sans-serif" }}>
      <h1>💬 Sistema de Comentarios Simple</h1>

      {/* FORMULARIO */}
      <form onSubmit={GuardarComentario}>
        <input 
          type="text" 
          placeholder="Escribe un comentario..." 
          value={nuevoTexto}
          onChange={(e) => setNuevoTexto(e.target.value)}
          style={{ padding: "10px", width: "250px", marginRight: "10px" }}
        />
        <button type="submit" style={{ padding: "10px" }}>Publicar</button>
      </form>

      {/* LISTADO DE COMENTARIOS */}
      <h3>Comentarios Publicados:</h3>
      <ul>
        {comentarios.map((texto, index) => (
          <li key={index} style={{ margin: "10px 0" }}>{texto}</li>
        ))}
      </ul>
    </div>
  );
}

export default App;