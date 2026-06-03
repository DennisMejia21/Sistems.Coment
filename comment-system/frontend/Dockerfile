FROM node:18-alpine

WORKDIR /app

# Copiar los archivos de configuración de dependencias
COPY package*.json ./

# Instalar Node modules dentro del contenedor
RUN npm install

# Copiar el resto del código del frontend
COPY . .

# Exponer el puerto de React (5173) y correr el servidor de desarrollo
EXPOSE 5173
CMD ["npm", "run", "dev", "--", "--host"]