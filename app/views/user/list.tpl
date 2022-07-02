<div>
  <ul>
    {foreach from=$users item=$user}
      <li>{$user->name}</li>
    {/foreach}
  </ul>
</div>