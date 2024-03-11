import React, { useState } from 'react';
import './ShoppingList.css';
import { useQuery, useMutation, useQueryClient } from 'react-query';
import { getItems, deleteItem, createItem } from '../../services/itemsCrud.js';

const ShoppingList = () => {
  const queryClient = useQueryClient();
  const { data, isLoading } = useQuery(['items'], () => getItems(), {
    keepPreviousData: true,
    refetchOnWindowFocus: false
  });
  const deleteMutation = useMutation(deleteItem, {
    onSuccess: () => {
      queryClient.invalidateQueries('items');
    }
  });

  const addMutation = useMutation(createItem, {
    onSuccess: () => {
      queryClient.invalidateQueries('items');
      setName('');
      setAmount('');
    }
  });

  const handleDelete = (stationID) => {
    deleteMutation.mutate(stationID);
  };

  const handeAddItem = (name, amount) => {
    addMutation.mutate({ name, amount });
  };
  const [name, setName] = useState('');
  const [amount, setAmount] = useState('');

  return (
    <div className="shopping-list">
      <div className="header">
        <div className="logo"></div>
        <h1>Shopping List</h1>
      </div>
      <div className="list-container">
        <div className="column-headers">
          <span>...column headers...</span>
        </div>

        {isLoading ? (
          <div className="loader"></div>
        ) : (
          data?.map((item) => (
            <div className="list-item" key={item?.id}>
              <div>{item?.name}</div>
              <div>{item?.amount}</div>
              <button
                type="button"
                onClick={() => {
                  handleDelete(item?.id);
                }}
              >
                remove
              </button>
            </div>
          ))
        )}
      </div>
      <div className="add-item">
        <input
          type="text"
          placeholder="name"
          value={name}
          onChange={(e) => setName(e.target.value)}
        />
        <input
          type="number"
          placeholder="amount"
          value={amount}
          onChange={(e) => setAmount(e.target.value)}
        />
        <button
          type="button"
          onClick={() => {
            handeAddItem(name, amount);
          }}
        >
          add
        </button>
      </div>
    </div>
  );
};

export default ShoppingList;
