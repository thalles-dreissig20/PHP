  SELECT pedidos.id, clientes.nome, status_pedido.status, tamanhos.tamanho

  FROM pedidos, clientes, status_pedido, tamanhos

  WHERE pedidos.id_cliente = clientes.id  
  AND pedidos.id_status = status_pedido.id
  AND pedidos.id_tamanho = tamanhos.id



  SELECT p.id as pedido, c.nome, t.tamanho, s.status
  FROM pedidos p 
  INNER JOIN clientes c ON c.id = p.id_cliente 
  INNER JOIN tamanhos t ON t.id = p.id_tamanho 
  INNER JOIN status_pedido s ON s.id = p.id_status 
  ORDER BY p.dt_pedido

  SELECT s.sabor, s.ingredientes 
FROM pedido_sabor ps
INNER JOIN sabores s ON s.id = ps.id_sabor
WHERE ps.id_pedidos = 8

SELECT sabor.nome_sabor , sabor.ingredientes
                        FROM pedido_sabor
                        INNER JOIN sabores ON nome_sabor.id = pedido_sabor.id_sabor
                        WHERE pedido_sabor.id_sabor = $sabor->id";


 SELECT p.dt_pedido, c.nome, t.tamanho, t.valor 
FROM pedidos p 
INNER JOIN clientes c ON c.id = p.id_cliente
INNER JOIN tamanhos t ON t.id = p.id_tamanho
ORDER BY p.dt_pedido