import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App.jsx'

// Buscamos el "root" del HTML y encendemos React ahí adentro
ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <App />
  </React.StrictMode>,
)