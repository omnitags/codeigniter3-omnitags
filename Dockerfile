# Base image
FROM node:16

# Set working directory
WORKDIR /app

# Copy files
COPY package*.json ./
COPY . .

# Install dependencies
RUN npm install

# Expose port
EXPOSE 3000

# Run application
CMD ["npm", "start"]
