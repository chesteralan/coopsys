import { useState } from "react";
import Radio from "../input/Radio";

type GenderInputProps = {
  className?: string;
};

export default function GenderInput({ className = "" }: GenderInputProps) {
  const [selectedValue, setSelectedValue] = useState<string>("male");

  const handleRadioChange = (value: string) => {
    setSelectedValue(value);
  };

  return (
     <div className={`relative ${className}`}>
      <label htmlFor="gender" className="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Gender</label>
      <div className="flex flex-wrap items-center gap-8">
        <Radio
          id="gender1"
          name="gender"
          value="male"
          checked={selectedValue === "male"}
          onChange={handleRadioChange}
          label="Male"
        />
        <Radio
          id="gender2"
          name="gender"
          value="female"
          checked={selectedValue === "female"}
          onChange={handleRadioChange}
          label="Female"
        />
      </div>
    </div>
  );
}
