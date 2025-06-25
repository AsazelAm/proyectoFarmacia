# proyectoFarmacia
# 1. verificar usuario y correo
git config user.name
git config user.email
# para cambiar de usuario
git config user.name "tunombre"
git config user.email "tucorreo@gmail.com"

# clonar repositorio remoto
git clone git@asaf:AsazelAm/su-repo.git
git remote -v | verifica el repositorio remoto

# subir por primera vez
# Crear rama main (si no existe)
git branch -M main
# Subir por primera vez
git push -u origin main

# subida normal
git status     para ver los cambios
git add .       para añadir los cambio
git commit -m "comentario..."   
git push -u origin main     Con esto lo subo 

# Forzar el push y sobrescribir lo remoto
//esto es si no vajamos los cambios del git y no lo consideramos importante
git push -u origin main --force
# actualiza la url del remoto
git remote set-url origin git@asaf:AsazelAm/proyectoFarmacia.git