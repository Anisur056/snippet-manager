* **`docker compose down`**: The most basic use. It stops and removes containers and the default network.
* **`docker compose down -v`**: Stops and removes containers, the default network, and any **anonymous volumes**.
* **`docker compose down --rmi all`**: Stops containers and removes them, along with all the images used by the services.
* **`docker compose down --remove-orphans`**: Stops and removes the containers for all defined services and also any "orphan" containers that are no longer referenced in the `docker-compose.yml` file.

* ## Key Flags

* **`-v, --volumes`**: This flag removes **anonymous volumes** associated with the services. If you have a named volume, it will not be removed unless you explicitly specify it.
* **`--rmi type`**: This removes the images used by the services. The `type` can be `all` (removes all images) or `local` (removes only images that don't have a configured tag).
* **`--remove-orphans`**: This removes containers for services that are not defined in the `docker-compose.yml` file, but were part of the project's network. This is useful for cleaning up after removing a service definition from the file.
